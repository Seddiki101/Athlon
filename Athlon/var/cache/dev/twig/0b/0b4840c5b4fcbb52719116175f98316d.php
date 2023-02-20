<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* base.html.twig */
class __TwigTemplate_d37d1c3621cb1b31c9f974580366ac09 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'javascripts' => [$this, 'block_javascripts'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html lang=\"zxx\">
    <head>
        <meta charset=\"UTF-8\">
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <meta name=\"description\" content=\"Activitar Template\">
        <meta name=\"keywords\" content=\"Activitar, unica, creative, html\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
        <link rel=\"icon\" href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/F/data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>⚫️</text></svg>"), "html", null, true);
        echo "\">
        ";
        // line 12
        echo "        ";
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 24
        echo "
        ";
        // line 25
        $this->displayBlock('javascripts', $context, $blocks);
        // line 36
        echo "    </head>
    <body>
    <!-- Page Preloder -->
    

    <!-- Header Section Begin -->
    <header class=\"header-section header-normal\">
        <div class=\"container-fluid\">
            <div class=\"logo\">
                <a href=\"./index.html\">
                    <img src=\"img/logo.png\" alt=\"\">
                </a>
            </div>

            <div class=\"top-social\">
                <a href=\"#\">  <i class=\"fa fa-user\"></i> Sign up/Sign in  </a>
            </div>
            <div class=\"top-social\">
                <a href=\".\">  <i class=\"fa fa-cart-plus\"></i> Cart  </a>
            </div>
            <div class=\"container\">
                <div class=\"nav-menu\">
                    <nav class=\"mainmenu mobile-menu\">
                        <ul>
                            <li><a href=\"./index.html\">Home</a></li>
                            <li><a href=\"./about-us.html\">About us</a></li>
                            <li><a href=\"./schedule.html\">Schedule</a></li>
                            <li class=\"active\"><a href=\"./gallery.html\">Gallery</a></li>
                            <li><a href=\"./blog.html\">Blog</a>
                                <ul class=\"dropdown\">
                                    <li><a href=\"./about-us.html\">About Us</a></li>
                                    <li><a href=\"./blog-single.html\">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href=\"./contact.html\">Contacts</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div id=\"mobile-menu-wrap\"></div>
        </div>
    </header>

        ";
        // line 79
        $this->displayBlock('body', $context, $blocks);
        // line 80
        echo "    </body>
</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 5
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 12
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 13
        echo "            <!-- Css Styles -->
            <link rel=\"stylesheet\" href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/F/css/bootstrap.min.css"), "html", null, true);
        echo "\" type=\"text/css\">

            <link rel=\"stylesheet\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/F/css/font-awesome.min.css"), "html", null, true);
        echo "\" type=\"text/css\">
            <link rel=\"stylesheet\" href=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/F/css/elegant-icons.css"), "html", null, true);
        echo "\" type=\"text/css\">
            <link rel=\"stylesheet\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/F/css/nice-select.css"), "html", null, true);
        echo "\" type=\"text/css\">
            <link rel=\"stylesheet\" href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/F/css/owl.carousel.min.css"), "html", null, true);
        echo "\" type=\"text/css\">
            <link rel=\"stylesheet\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/F/css/magnific-popup.css"), "html", null, true);
        echo "\" type=\"text/css\">
            <link rel=\"stylesheet\" href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/F/css/slicknav.min.css"), "html", null, true);
        echo "\" type=\"text/css\">
            <link rel=\"stylesheet\" href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/F/css/style.css"), "html", null, true);
        echo "\" type=\"text/css\">
        ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 25
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 26
        echo "            <script src=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/F/js/jquery-3.3.1.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/F/js/bootstrap.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/F/js/jquery.magnific-popup.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/F/js/mixitup.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/F/js/jquery.nice-select.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/F/js/jquery.slicknav.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/F/js/owl.carousel.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/F/js/masonry.pkgd.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/F/s/main.js"), "html", null, true);
        echo "\"></script>
        ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 79
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  260 => 79,  248 => 34,  244 => 33,  240 => 32,  236 => 31,  232 => 30,  228 => 29,  224 => 28,  220 => 27,  215 => 26,  205 => 25,  193 => 22,  189 => 21,  185 => 20,  181 => 19,  177 => 18,  173 => 17,  169 => 16,  164 => 14,  161 => 13,  151 => 12,  132 => 5,  120 => 80,  118 => 79,  73 => 36,  71 => 25,  68 => 24,  65 => 12,  61 => 10,  53 => 5,  47 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"zxx\">
    <head>
        <meta charset=\"UTF-8\">
        <title>{% block title %}Welcome!{% endblock %}</title>
        <meta name=\"description\" content=\"Activitar Template\">
        <meta name=\"keywords\" content=\"Activitar, unica, creative, html\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
        <link rel=\"icon\" href=\"{{ asset('/F/data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>⚫️</text></svg>') }}\">
        {# Run `composer require symfony/webpack-encore-bundle` to start using Symfony UX #}
        {% block stylesheets %}
            <!-- Css Styles -->
            <link rel=\"stylesheet\" href=\"{{ asset('/F/css/bootstrap.min.css') }}\" type=\"text/css\">

            <link rel=\"stylesheet\" href=\"{{ asset('/F/css/font-awesome.min.css') }}\" type=\"text/css\">
            <link rel=\"stylesheet\" href=\"{{ asset('/F/css/elegant-icons.css') }}\" type=\"text/css\">
            <link rel=\"stylesheet\" href=\"{{ asset('/F/css/nice-select.css') }}\" type=\"text/css\">
            <link rel=\"stylesheet\" href=\"{{ asset('/F/css/owl.carousel.min.css') }}\" type=\"text/css\">
            <link rel=\"stylesheet\" href=\"{{ asset('/F/css/magnific-popup.css') }}\" type=\"text/css\">
            <link rel=\"stylesheet\" href=\"{{ asset('/F/css/slicknav.min.css') }}\" type=\"text/css\">
            <link rel=\"stylesheet\" href=\"{{ asset('/F/css/style.css') }}\" type=\"text/css\">
        {% endblock %}

        {% block javascripts %}
            <script src=\"{{ asset(\"/F/js/jquery-3.3.1.min.js\") }}\"></script>
            <script src=\"{{ asset(\"/F/js/bootstrap.min.js\") }}\"></script>
            <script src=\"{{ asset(\"/F/js/jquery.magnific-popup.min.js\") }}\"></script>
            <script src=\"{{ asset(\"/F/js/mixitup.min.js\") }}\"></script>
            <script src=\"{{ asset(\"/F/js/jquery.nice-select.min.js\") }}\"></script>
            <script src=\"{{ asset(\"/F/js/jquery.slicknav.js\") }}\"></script>
            <script src=\"{{ asset(\"/F/js/owl.carousel.min.js\") }}\"></script>
            <script src=\"{{ asset(\"/F/js/masonry.pkgd.min.js\") }}\"></script>
            <script src=\"{{ asset(\"/F/s/main.js\") }}\"></script>
        {% endblock %}
    </head>
    <body>
    <!-- Page Preloder -->
    

    <!-- Header Section Begin -->
    <header class=\"header-section header-normal\">
        <div class=\"container-fluid\">
            <div class=\"logo\">
                <a href=\"./index.html\">
                    <img src=\"img/logo.png\" alt=\"\">
                </a>
            </div>

            <div class=\"top-social\">
                <a href=\"#\">  <i class=\"fa fa-user\"></i> Sign up/Sign in  </a>
            </div>
            <div class=\"top-social\">
                <a href=\".\">  <i class=\"fa fa-cart-plus\"></i> Cart  </a>
            </div>
            <div class=\"container\">
                <div class=\"nav-menu\">
                    <nav class=\"mainmenu mobile-menu\">
                        <ul>
                            <li><a href=\"./index.html\">Home</a></li>
                            <li><a href=\"./about-us.html\">About us</a></li>
                            <li><a href=\"./schedule.html\">Schedule</a></li>
                            <li class=\"active\"><a href=\"./gallery.html\">Gallery</a></li>
                            <li><a href=\"./blog.html\">Blog</a>
                                <ul class=\"dropdown\">
                                    <li><a href=\"./about-us.html\">About Us</a></li>
                                    <li><a href=\"./blog-single.html\">Blog Details</a></li>
                                </ul>
                            </li>
                            <li><a href=\"./contact.html\">Contacts</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div id=\"mobile-menu-wrap\"></div>
        </div>
    </header>

        {% block body %}{% endblock %}
    </body>
</html>
", "base.html.twig", "C:\\xampp\\htdocs\\Athlon\\templates\\base.html.twig");
    }
}
