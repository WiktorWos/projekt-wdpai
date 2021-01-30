<?php

class AppController {
    private $request;

    public function __construct()
    {
        $this->request = $_SERVER['REQUEST_METHOD'];
    }

    protected function isGet(): bool
    {
        return $this->request === 'GET';
    }

    protected function isPost(): bool
    {
        return $this->request === 'POST';
    }

    protected function render(string $template = null, array $variables = [])
    {
        $templatePath = 'public/views/'. $template.'.php';
        $output = 'File not found';
                
        if(file_exists($templatePath)){
            extract($variables);
            
            ob_start();
            include $templatePath;
            $output = ob_get_clean();
        }
        print $output;
    }

    protected function renderIfLoggedIn($template) {
        if(isset($_SESSION) and $_SESSION['loggedIn']) {
            $this->render($template);
        } else {
            $this->render('login', ['messages' => ['Youre not logged in']]);
        }
    }

    protected function isLoggedIn() {
        return isset($_SESSION) and $_SESSION['loggedIn'];
    }
}