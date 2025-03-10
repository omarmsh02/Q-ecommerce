<?php

/**
 * Base Controller Class
 *
 * Provides common controller functionality and serves as a foundation
 * for all controller classes in the MVC application.
 */
class Controller
{
    /**
     * The default layout to use for views
     */
    protected $layout = 'default';

    /**
     * Data to be passed to views
     */
    protected $viewData = [];

    /**
     * Constructor
     */
    public function __construct()
    {
        // Initialize common controller resources
        $this->initializeSession();
    }

    /**
     * Initialize session if it hasn't been started
     */
    protected function initializeSession()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    /**
     * Render a view with the given data
     *
     * @param string $view Path to the view file (without .php extension)
     * @param array $data Data to be extracted and available in the view
     * @param boolean $useLayout Whether to use layout or render view directly
     * @return void
     */
    protected function render($view, $data = [], $useLayout = true)
    {
        // Merge any existing view data with the provided data
        $this->viewData = array_merge($this->viewData, $data);

        // Start output buffering
        ob_start();

        // Extract data to make variables available in view
        extract($this->viewData);

        // Check if view file exists
        $viewFile = $this->getViewPath($view);
       // dd($viewFile);
        if (!file_exists($viewFile)) {
            throw new Exception("View file not found: {$viewFile}");
        }

        // Include the view file
        require $viewFile;
        dd($viewFile);

        // Get the rendered content
        $content = ob_get_clean();

    }

    /**
     * Set layout to use for rendering
     *
     * @param string $layout Name of the layout
     * @return void
     */
    protected function setLayout($layout)
    {
        $this->layout = $layout;
    }

    /**
     * Get the full path to a view file
     *
     * @param string $view View name
     * @return string Full path to view file
     */
    protected function getViewPath($view)
    {
        // Convert dot notation to directory structure (e.g., 'user.profile' to 'user/profile')
        $view = str_replace('.', '/', $view);
        return dirname(__DIR__) . '/views/' . $view . '.view.php';
    }

    /**
     * Get the full path to a layout file
     *
     * @param string $layout Layout name
     * @return string Full path to layout file
     */
    protected function getLayoutPath($layout)
    {
        return dirname(__DIR__) . '/views/layouts/' . $layout . '.php';
    }

    /**
     * Set a flash message to be displayed on the next request
     *
     * @param string $type The type of message (success, error, info, warning)
     * @param string $message The message content
     * @return void
     */
    protected function setFlash($type, $message)
    {
        $_SESSION['flash_messages'][$type] = $message;
    }

    /**
     * Get flash messages and clear them
     *
     * @return array Array of flash messages
     */
    protected function getFlash()
    {
        $flash = isset($_SESSION['flash_messages']) ? $_SESSION['flash_messages'] : [];
        unset($_SESSION['flash_messages']);
        return $flash;
    }

    /**
     * Redirect to another URL
     *
     * @param string $url The URL to redirect to
     * @param int $statusCode HTTP status code for the redirect
     * @return void
     */
    protected function redirect($url, $statusCode = 302)
    {
        header('Location: ' . $url, true, $statusCode);
        exit;
    }

    /**
     * Get a model instance
     *
     * @param string $modelName Name of the model class
     * @return object Model instance
     */
    protected function model($modelName)
    {
        // Convert to proper case for class name (e.g., 'user' to 'User')
        $className = ucfirst($modelName);

        // Check if model file exists and include it if necessary
        $modelFile = dirname(__DIR__) . '/models/' . $className . '.php';
        if (file_exists($modelFile) && !class_exists($className)) {
            require_once $modelFile;
        }

        // Create and return model instance
        if (class_exists($className)) {
            return new $className();
        } else {
            throw new Exception("Model not found: {$className}");
        }
    }

    /**
     * Check if the request is an AJAX request
     *
     * @return bool True if AJAX request, false otherwise
     */
    protected function isAjax()
    {
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
            strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }

    /**
     * Return JSON response
     *
     * @param mixed $data Data to encode as JSON
     * @param int $statusCode HTTP status code
     * @return void
     */
    protected function json($data, $statusCode = 200)
    {
        header('Content-Type: application/json');
        http_response_code($statusCode);
        echo json_encode($data);
        exit;
    }

    /**
     * Validate request data
     *
     * @param array $rules Validation rules in format ['field' => 'rule1|rule2']
     * @param array $data Data to validate (uses $_POST by default)
     * @return array Array of validation errors or empty array if valid
     */
    protected function validate($rules, $data = null)
    {
        // Use POST data if no data provided
        if ($data === null) {
            $data = $_POST;
        }

        $errors = [];

        foreach ($rules as $field => $fieldRules) {
            // Skip if field not in data
            if (!isset($data[$field]) && strpos($fieldRules, 'required') === false) {
                continue;
            }

            $fieldValue = isset($data[$field]) ? $data[$field] : '';
            $ruleList = explode('|', $fieldRules);

            foreach ($ruleList as $rule) {
                // Check for rule with parameters (e.g., min:8)
                if (strpos($rule, ':') !== false) {
                    list($ruleName, $ruleParam) = explode(':', $rule, 2);
                } else {
                    $ruleName = $rule;
                    $ruleParam = null;
                }

                switch ($ruleName) {
                    case 'required':
                        if (empty($fieldValue) && $fieldValue !== '0') {
                            $errors[$field][] = "The {$field} field is required.";
                        }
                        break;

                    case 'min':
                        if (strlen($fieldValue) < $ruleParam) {
                            $errors[$field][] = "The {$field} must be at least {$ruleParam} characters.";
                        }
                        break;

                    case 'max':
                        if (strlen($fieldValue) > $ruleParam) {
                            $errors[$field][] = "The {$field} must not exceed {$ruleParam} characters.";
                        }
                        break;

                    case 'email':
                        if (!filter_var($fieldValue, FILTER_VALIDATE_EMAIL)) {
                            $errors[$field][] = "The {$field} must be a valid email address.";
                        }
                        break;

                    case 'numeric':
                        if (!is_numeric($fieldValue)) {
                            $errors[$field][] = "The {$field} must be a number.";
                        }
                        break;

                    case 'alpha':
                        if (!ctype_alpha($fieldValue)) {
                            $errors[$field][] = "The {$field} must contain only letters.";
                        }
                        break;

                    case 'alphanumeric':
                        if (!ctype_alnum($fieldValue)) {
                            $errors[$field][] = "The {$field} must contain only letters and numbers.";
                        }
                        break;
                }
            }
        }

        return $errors;
    }
}