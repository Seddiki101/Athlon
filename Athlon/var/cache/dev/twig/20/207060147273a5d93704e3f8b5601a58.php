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

/* base3.html.twig */
class __TwigTemplate_5aa5f6e6a02ebcec79cf1771d8bbf0e8 extends Template
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
            'header' => [$this, 'block_header'],
            'body' => [$this, 'block_body'],
            'footer' => [$this, 'block_footer'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base3.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base3.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        <link rel=\"icon\" href=\"data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>⚫️</text></svg>\">
        ";
        // line 8
        echo "        ";
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 28
        echo "
        ";
        // line 29
        $this->displayBlock('javascripts', $context, $blocks);
        // line 46
        echo "    </head>
\t
\t
    <body>
\t
\t";
        // line 51
        $this->displayBlock('header', $context, $blocks);
        // line 137
        echo " <!-- /header -->
\t
\t
\t
\t
\t
\t
\t
\t\t\t\t";
        // line 145
        $this->displayBlock('body', $context, $blocks);
        // line 147
        echo "<!-- /body -->
\t\t
\t\t
\t\t
\t\t
\t\t




\t";
        // line 157
        $this->displayBlock('footer', $context, $blocks);
        // line 163
        echo " <!-- /footer -->\t\t
\t\t
\t\t
\t\t
\t\t
\t\t
\t\t
\t\t
\t\t
\t\t
\t\t
\t\t
\t\t
\t\t
\t\t

    </body>
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

    // line 8
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 9
        echo "
            <!-- Favicons -->
            <link href=\"img/favicon.png\" rel=\"icon\">
            <link href=\"img/apple-touch-icon.png\" rel=\"apple-touch-icon\">

            <!-- Google Fonts -->
            <link href=\"https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i\" rel=\"stylesheet\">


            <link type=\"text/css\" href=\"";
        // line 18
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/B/bootstrap/css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
            <link type=\"text/css\" href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/B/bootstrap/css/bootstrap-responsive.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
            <link type=\"text/css\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/B/css/theme.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
            <link type=\"text/css\" href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/B/images/icons/css/font-awesome.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
            <link type=\"text/css\" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
                  rel='stylesheet'>

            <link href=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/B/css/style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
\t\t\t";
        // line 26
        echo twig_escape_filter($this->env, $this->env->getFunction('encore_entry_link_tags')->getCallable()("app"), "html", null, true);
        echo "
        ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 29
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 30
        echo "            <!-- Libraries JS Files -->
            <script src=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/B/libraries/jquery/jquery.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/B/libraries/bootstrap/js/bootstrap.bundle.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/B/libraries/jquery.easing/jquery.easing.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/B/libraries/php-email-form/validate.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/B/libraries/waypoints/jquery.waypoints.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/B/libraries/counterup/counterup.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/B/libraries/owl.carousel/owl.carousel.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/B/libraries/isotope-layout/isotope.pkgd.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/B/libraries/venobox/venobox.min.js"), "html", null, true);
        echo "\"></script>
            <script src=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/B/libraries/aos/aos.js"), "html", null, true);
        echo "\"></script>

            <!-- Template Main JS File -->
            <script src=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/B/js/main.js"), "html", null, true);
        echo "\"></script>
\t\t\t";
        // line 44
        echo twig_escape_filter($this->env, $this->env->getFunction('encore_entry_script_tags')->getCallable()("app"), "html", null, true);
        echo "
        ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 51
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "header"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "header"));

        // line 52
        echo "\t
\t\t\t<div>
\t\t\t<div class=\"navbar navbar-fixed-top\">
\t\t<div class=\"navbar-inner\">
\t\t\t<div class=\"container\">
\t\t\t\t<a class=\"btn btn-navbar\" data-toggle=\"collapse\" data-target=\".navbar-inverse-collapse\">
\t\t\t\t\t<i class=\"icon-reorder shaded\"></i>
\t\t\t\t</a>

\t\t\t  \t<a class=\"brand\" href=\"index.html\">
\t\t\t  \t\tEdmin
\t\t\t  \t</a>



\t\t\t\t\t<form class=\"navbar-search pull-left input-append\" action=\"#\">
\t\t\t\t\t\t<input type=\"text\" class=\"span3\">
\t\t\t\t\t\t<button class=\"btn\" type=\"button\">
\t\t\t\t\t\t\t<i class=\"icon-search\"></i>
\t\t\t\t\t\t</button>
\t\t\t\t\t</form>
\t\t\t\t
\t\t\t\t\t<ul class=\"nav pull-right\">

\t\t\t\t\t\t<li class=\"nav-user dropdown\">
\t\t\t\t\t\t\t<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
\t\t\t\t\t\t\t\t<img src=\"images/user.png\" class=\"nav-avatar\" />
\t\t\t\t\t\t\t\t<b class=\"caret\"></b>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t<ul class=\"dropdown-menu\">
\t\t\t\t\t\t\t\t<li><a href=\"#\">Your Profile</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"#\">Edit Profile</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"#\">Account Settings</a></li>
\t\t\t\t\t\t\t\t<li class=\"divider\"></li>
\t\t\t\t\t\t\t\t<li><a href=\"#\">Logout</a></li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t</div><!-- /.nav-collapse -->
\t\t\t</div>
\t\t</div><!-- /navbar-inner -->
\t</div><!-- /navbar -->

\t
\t
\t
\t
\t        <div>
\t\t<div class=\"container\">
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"span3\">
\t\t\t\t\t<div class=\"sidebar\">

\t\t\t\t\t\t<ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"ui-button-icon.html\"><i class=\"menu-icon icon-bold\"></i> Utilisateur </a></li>
                                <li><a href=\"charts.html\"><i class=\"menu-icon icon-bar-chart\"></i>Reclamation </a></li>
                                <li><a href=\"ui-typography.html\"><i class=\"menu-icon icon-book\"></i>Article </a></li>
                                <li><a href=\"form.html\"><i class=\"menu-icon icon-paste\"></i>Sujet </a></li>
                                <li><a href=\"table.html\"><i class=\"menu-icon icon-table\"></i>Produit </a></li>
                                <li><a href=\"charts.html\"><i class=\"menu-icon icon-bar-chart\"></i>Exercice </a></li>
                                <li><a href=\"charts.html\"><i class=\"menu-icon icon-bar-chart\"></i>Cour </a></li>
                                <li><a href=\"charts.html\"><i class=\"menu-icon icon-bar-chart\"></i>Categorie </a></li>
                                <li><a href=\"charts.html\"><i class=\"menu-icon icon-bar-chart\"></i>Employee </a></li>
                                <li><a href=\"charts.html\"><i class=\"menu-icon icon-bar-chart\"></i>Conge </a></li>
                                <li><a href=\"charts.html\"><i class=\"menu-icon icon-bar-chart\"></i>Commande </a></li>
                                <li><a href=\"charts.html\"><i class=\"menu-icon icon-bar-chart\"></i>Livraison </a></li>\t\t\t\t\t\t\t\t
                            </ul><!--/.widget-nav-->


\t\t\t\t\t</div><!--/.sidebar-->
\t\t\t\t</div><!--/.span3-->



\t\t\t</div>
\t\t</div><!--/.container-->
\t</div><!--/.wrapper-->

\t
\t
\t
\t
\t
\t
\t
\t";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 145
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 146
        echo "\t\t\t
\t\t\t\t";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 157
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "footer"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "footer"));

        // line 158
        echo "\t<div class=\"footer\">
\t\t<div class=\"container\">
\t\t\t<b class=\"copyright\">&copy; 2014 Edmin - EGrappler.com </b> All rights reserved.
\t\t</div>
\t</div>
\t";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "base3.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  413 => 158,  403 => 157,  392 => 146,  382 => 145,  287 => 52,  277 => 51,  265 => 44,  261 => 43,  255 => 40,  251 => 39,  247 => 38,  243 => 37,  239 => 36,  235 => 35,  231 => 34,  227 => 33,  223 => 32,  219 => 31,  216 => 30,  206 => 29,  194 => 26,  190 => 25,  183 => 21,  179 => 20,  175 => 19,  171 => 18,  160 => 9,  150 => 8,  131 => 5,  103 => 163,  101 => 157,  89 => 147,  87 => 145,  77 => 137,  75 => 51,  68 => 46,  66 => 29,  63 => 28,  60 => 8,  55 => 5,  49 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <title>{% block title %}Welcome!{% endblock %}</title>
        <link rel=\"icon\" href=\"data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>⚫️</text></svg>\">
        {# Run `composer require symfony/webpack-encore-bundle` to start using Symfony UX #}
        {% block stylesheets %}

            <!-- Favicons -->
            <link href=\"img/favicon.png\" rel=\"icon\">
            <link href=\"img/apple-touch-icon.png\" rel=\"apple-touch-icon\">

            <!-- Google Fonts -->
            <link href=\"https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i\" rel=\"stylesheet\">


            <link type=\"text/css\" href=\"{{asset('/B/bootstrap/css/bootstrap.min.css')}}\" rel=\"stylesheet\">
            <link type=\"text/css\" href=\"{{asset('/B/bootstrap/css/bootstrap-responsive.min.css')}}\" rel=\"stylesheet\">
            <link type=\"text/css\" href=\"{{asset('/B/css/theme.css')}}\" rel=\"stylesheet\">
            <link type=\"text/css\" href=\"{{asset('/B/images/icons/css/font-awesome.css')}}\" rel=\"stylesheet\">
            <link type=\"text/css\" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
                  rel='stylesheet'>

            <link href=\"{{asset('/B/css/style.css')}}\" rel=\"stylesheet\">
\t\t\t{{ encore_entry_link_tags('app') }}
        {% endblock %}

        {% block javascripts %}
            <!-- Libraries JS Files -->
            <script src=\"{{asset('/B/libraries/jquery/jquery.min.js')}}\"></script>
            <script src=\"{{asset('/B/libraries/bootstrap/js/bootstrap.bundle.min.js')}}\"></script>
            <script src=\"{{asset('/B/libraries/jquery.easing/jquery.easing.min.js')}}\"></script>
            <script src=\"{{asset('/B/libraries/php-email-form/validate.js')}}\"></script>
            <script src=\"{{asset('/B/libraries/waypoints/jquery.waypoints.min.js')}}\"></script>
            <script src=\"{{asset('/B/libraries/counterup/counterup.min.js')}}\"></script>
            <script src=\"{{asset('/B/libraries/owl.carousel/owl.carousel.min.js')}}\"></script>
            <script src=\"{{asset('/B/libraries/isotope-layout/isotope.pkgd.min.js')}}\"></script>
            <script src=\"{{asset('/B/libraries/venobox/venobox.min.js')}}\"></script>
            <script src=\"{{asset('/B/libraries/aos/aos.js')}}\"></script>

            <!-- Template Main JS File -->
            <script src=\"{{asset('/B/js/main.js')}}\"></script>
\t\t\t{{ encore_entry_script_tags('app') }}
        {% endblock %}
    </head>
\t
\t
    <body>
\t
\t{% block header %}
\t
\t\t\t<div>
\t\t\t<div class=\"navbar navbar-fixed-top\">
\t\t<div class=\"navbar-inner\">
\t\t\t<div class=\"container\">
\t\t\t\t<a class=\"btn btn-navbar\" data-toggle=\"collapse\" data-target=\".navbar-inverse-collapse\">
\t\t\t\t\t<i class=\"icon-reorder shaded\"></i>
\t\t\t\t</a>

\t\t\t  \t<a class=\"brand\" href=\"index.html\">
\t\t\t  \t\tEdmin
\t\t\t  \t</a>



\t\t\t\t\t<form class=\"navbar-search pull-left input-append\" action=\"#\">
\t\t\t\t\t\t<input type=\"text\" class=\"span3\">
\t\t\t\t\t\t<button class=\"btn\" type=\"button\">
\t\t\t\t\t\t\t<i class=\"icon-search\"></i>
\t\t\t\t\t\t</button>
\t\t\t\t\t</form>
\t\t\t\t
\t\t\t\t\t<ul class=\"nav pull-right\">

\t\t\t\t\t\t<li class=\"nav-user dropdown\">
\t\t\t\t\t\t\t<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
\t\t\t\t\t\t\t\t<img src=\"images/user.png\" class=\"nav-avatar\" />
\t\t\t\t\t\t\t\t<b class=\"caret\"></b>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t<ul class=\"dropdown-menu\">
\t\t\t\t\t\t\t\t<li><a href=\"#\">Your Profile</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"#\">Edit Profile</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"#\">Account Settings</a></li>
\t\t\t\t\t\t\t\t<li class=\"divider\"></li>
\t\t\t\t\t\t\t\t<li><a href=\"#\">Logout</a></li>
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t</div><!-- /.nav-collapse -->
\t\t\t</div>
\t\t</div><!-- /navbar-inner -->
\t</div><!-- /navbar -->

\t
\t
\t
\t
\t        <div>
\t\t<div class=\"container\">
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"span3\">
\t\t\t\t\t<div class=\"sidebar\">

\t\t\t\t\t\t<ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"ui-button-icon.html\"><i class=\"menu-icon icon-bold\"></i> Utilisateur </a></li>
                                <li><a href=\"charts.html\"><i class=\"menu-icon icon-bar-chart\"></i>Reclamation </a></li>
                                <li><a href=\"ui-typography.html\"><i class=\"menu-icon icon-book\"></i>Article </a></li>
                                <li><a href=\"form.html\"><i class=\"menu-icon icon-paste\"></i>Sujet </a></li>
                                <li><a href=\"table.html\"><i class=\"menu-icon icon-table\"></i>Produit </a></li>
                                <li><a href=\"charts.html\"><i class=\"menu-icon icon-bar-chart\"></i>Exercice </a></li>
                                <li><a href=\"charts.html\"><i class=\"menu-icon icon-bar-chart\"></i>Cour </a></li>
                                <li><a href=\"charts.html\"><i class=\"menu-icon icon-bar-chart\"></i>Categorie </a></li>
                                <li><a href=\"charts.html\"><i class=\"menu-icon icon-bar-chart\"></i>Employee </a></li>
                                <li><a href=\"charts.html\"><i class=\"menu-icon icon-bar-chart\"></i>Conge </a></li>
                                <li><a href=\"charts.html\"><i class=\"menu-icon icon-bar-chart\"></i>Commande </a></li>
                                <li><a href=\"charts.html\"><i class=\"menu-icon icon-bar-chart\"></i>Livraison </a></li>\t\t\t\t\t\t\t\t
                            </ul><!--/.widget-nav-->


\t\t\t\t\t</div><!--/.sidebar-->
\t\t\t\t</div><!--/.span3-->



\t\t\t</div>
\t\t</div><!--/.container-->
\t</div><!--/.wrapper-->

\t
\t
\t
\t
\t
\t
\t
\t{% endblock %} <!-- /header -->
\t
\t
\t
\t
\t
\t
\t
\t\t\t\t{% block body %}
\t\t\t
\t\t\t\t{% endblock %}<!-- /body -->
\t\t
\t\t
\t\t
\t\t
\t\t




\t{% block footer %}
\t<div class=\"footer\">
\t\t<div class=\"container\">
\t\t\t<b class=\"copyright\">&copy; 2014 Edmin - EGrappler.com </b> All rights reserved.
\t\t</div>
\t</div>
\t{% endblock %} <!-- /footer -->\t\t
\t\t
\t\t
\t\t
\t\t
\t\t
\t\t
\t\t
\t\t
\t\t
\t\t
\t\t
\t\t
\t\t
\t\t

    </body>
</html>
", "base3.html.twig", "C:\\xampp\\htdocs\\Athlon\\templates\\base3.html.twig");
    }
}
