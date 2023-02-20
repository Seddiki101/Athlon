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

/* base2.html.twig */
class __TwigTemplate_db6f801eeba1349dc4d9aa4f1496652c extends Template
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
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base2.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base2.html.twig"));

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
        echo "       
\t   ";
        // line 9
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 30
        echo "
        ";
        // line 31
        $this->displayBlock('javascripts', $context, $blocks);
        // line 50
        echo "    </head>
\t
\t
    <body>
\t        ";
        // line 54
        $this->displayBlock('header', $context, $blocks);
        // line 183
        echo "\t
\t
\t
        ";
        // line 186
        $this->displayBlock('body', $context, $blocks);
        // line 189
        echo "    
\t</body>
\t
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

    // line 9
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 10
        echo "\t   
\t     <!-- Favicons -->
  <link href=\"img/favicon.png\" rel=\"icon\">
  <link href=\"img/apple-touch-icon.png\" rel=\"apple-touch-icon\">

  <!-- Google Fonts -->
  <link href=\"https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i\" rel=\"stylesheet\">
  
\t   
\t\t<link type=\"text/css\" href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/B/bootstrap/css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link type=\"text/css\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/B/bootstrap/css/bootstrap-responsive.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link type=\"text/css\" href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/B/css/theme.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link type=\"text/css\" href=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/B/images/icons/css/font-awesome.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link type=\"text/css\" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
\t\t\t
\t\t  <link href=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/B/css/style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">\t
\t\t\t
            ";
        // line 28
        echo twig_escape_filter($this->env, $this->env->getFunction('encore_entry_link_tags')->getCallable()("app"), "html", null, true);
        echo "
        ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 31
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 32
        echo "\t\t
\t\t  <!-- Libraries JS Files -->
  <script src=\"";
        // line 34
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/B/libraries/jquery/jquery.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/B/libraries/bootstrap/js/bootstrap.bundle.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/B/libraries/jquery.easing/jquery.easing.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/B/libraries/php-email-form/validate.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/B/libraries/waypoints/jquery.waypoints.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/B/libraries/counterup/counterup.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/B/libraries/owl.carousel/owl.carousel.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/B/libraries/isotope-layout/isotope.pkgd.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/B/libraries/venobox/venobox.min.js"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("/B/libraries/aos/aos.js"), "html", null, true);
        echo "\"></script>

  <!-- Template Main JS File -->
  <script src=\"js/main.js\"></script>
\t\t
            ";
        // line 48
        echo twig_escape_filter($this->env, $this->env->getFunction('encore_entry_script_tags')->getCallable()("app"), "html", null, true);
        echo "
        ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 54
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "header"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "header"));

        // line 55
        echo "\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t\t<div class=\"navbar navbar-fixed-top\">
\t\t<div class=\"navbar-inner\">
\t\t\t<div class=\"container\">
\t\t\t\t<a class=\"btn btn-navbar\" data-toggle=\"collapse\" data-target=\".navbar-inverse-collapse\">
\t\t\t\t\t<i class=\"icon-reorder shaded\"></i>
\t\t\t\t</a>

\t\t\t  \t<a class=\"brand\" href=\"index.html\">
\t\t\t  \t\tEdmin
\t\t\t  \t</a>

\t\t\t\t<div class=\"nav-collapse collapse navbar-inverse-collapse\">
\t\t\t\t

\t\t\t\t\t<form class=\"navbar-search pull-left input-append\" action=\"#\">
\t\t\t\t\t\t<input type=\"text\" class=\"span3\">
\t\t\t\t\t\t<button class=\"btn\" type=\"button\">
\t\t\t\t\t\t\t<i class=\"icon-search\"></i>
\t\t\t\t\t\t</button>
\t\t\t\t\t</form>
\t\t\t\t
\t\t\t\t\t<ul class=\"nav pull-right\">
\t\t\t\t\t\t
\t\t\t\t\t\t
\t\t\t\t\t\t
\t\t\t\t\t\t<li class=\"nav-user dropdown\">
\t\t\t\t\t\t\t<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
\t\t\t\t\t\t\t\t<img src=\"/B/media/user1.png\" class=\"nav-avatar\" />
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
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t\t\t\t\t<div class=\"span3\">
\t\t\t\t\t<div class=\"sidebar\">

\t\t\t\t\t\t<ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"ui-button-icon.html\"><i class=\"menu-icon icon-bold\"></i> Utilisateur </a></li>
                                <li><a href=\"charts.html\"><i class=\"menu-icon icon-bar-chart\"></i>Reclamation </a></li>
                                <li><a href=\"";
        // line 118
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_article_index");
        echo "\"><i class=\"menu-icon icon-book\"></i>Article </a></li>
                                <li><a href=\"";
        // line 119
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_sujet_index");
        echo "\"><i class=\"menu-icon icon-paste\"></i>Sujet </a></li>
                                <li><a href=\"table.html\"><i class=\"menu-icon icon-table\"></i>Produit </a></li>
                                <li><a href=\"charts.html\"><i class=\"menu-icon icon-bar-chart\"></i>Exercice </a></li>
                                <li><a href=\"charts.html\"><i class=\"menu-icon icon-bar-chart\"></i>Cour </a></li>
                                <li><a href=\"charts.html\"><i class=\"menu-icon icon-bar-chart\"></i>Categorie </a></li>
                                <li><a href=\"";
        // line 124
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_employe_index");
        echo "\"><i class=\"menu-icon icon-bar-chart\"></i>Employee </a></li>
                                <li><a href=\"";
        // line 125
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_conge_index");
        echo "\"><i class=\"menu-icon icon-bar-chart\"></i>Conge </a></li>
                                <li><a href=\"charts.html\"><i class=\"menu-icon icon-bar-chart\"></i>Commande </a></li>
                                <li><a href=\"charts.html\"><i class=\"menu-icon icon-bar-chart\"></i>Livraison </a></li>\t\t\t\t\t\t\t\t
                            </ul><!--/.widget-nav-->

\t\t\t\t\t\t<ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"ui-button-icon.html\"><i class=\"menu-icon icon-bold\"></i> Buttons </a></li>
                                <li><a href=\"ui-typography.html\"><i class=\"menu-icon icon-book\"></i>Typography </a></li>
                                <li><a href=\"form.html\"><i class=\"menu-icon icon-paste\"></i>Forms </a></li>
                                <li><a href=\"table.html\"><i class=\"menu-icon icon-table\"></i>Tables </a></li>
                                <li><a href=\"charts.html\"><i class=\"menu-icon icon-bar-chart\"></i>Charts </a></li>
                            </ul><!--/.widget-nav-->

\t\t\t\t\t\t<ul class=\"widget widget-menu unstyled\">
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a class=\"collapsed\" data-toggle=\"collapse\" href=\"#togglePages\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon icon-cog\"></i>
\t\t\t\t\t\t\t\t\t<i class=\"icon-chevron-down pull-right\"></i><i class=\"icon-chevron-up pull-right\"></i>
\t\t\t\t\t\t\t\t\tMore Pages
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t<ul id=\"togglePages\" class=\"collapse unstyled\">
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a href=\"other-login.html\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"icon-inbox\"></i>
\t\t\t\t\t\t\t\t\t\t\tLogin
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a href=\"other-user-profile.html\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"icon-inbox\"></i>
\t\t\t\t\t\t\t\t\t\t\tProfile
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a href=\"other-user-listing.html\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"icon-inbox\"></i>
\t\t\t\t\t\t\t\t\t\t\tAll Users
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon icon-signout\"></i>
\t\t\t\t\t\t\t\t\tLogout
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t</ul>

\t\t\t\t\t</div><!--/.sidebar-->
\t\t\t\t</div><!--/.span3-->
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t<!--/header-->
\t\t\t";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    // line 186
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 187
        echo "\t\t
\t\t";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "base2.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  413 => 187,  403 => 186,  335 => 125,  331 => 124,  323 => 119,  319 => 118,  254 => 55,  244 => 54,  232 => 48,  224 => 43,  220 => 42,  216 => 41,  212 => 40,  208 => 39,  204 => 38,  200 => 37,  196 => 36,  192 => 35,  188 => 34,  184 => 32,  174 => 31,  162 => 28,  157 => 26,  150 => 22,  146 => 21,  142 => 20,  138 => 19,  127 => 10,  117 => 9,  98 => 5,  84 => 189,  82 => 186,  77 => 183,  75 => 54,  69 => 50,  67 => 31,  64 => 30,  62 => 9,  59 => 8,  54 => 5,  48 => 1,);
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
       
\t   {% block stylesheets %}
\t   
\t     <!-- Favicons -->
  <link href=\"img/favicon.png\" rel=\"icon\">
  <link href=\"img/apple-touch-icon.png\" rel=\"apple-touch-icon\">

  <!-- Google Fonts -->
  <link href=\"https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i\" rel=\"stylesheet\">
  
\t   
\t\t<link type=\"text/css\" href=\"{{asset('/B/bootstrap/css/bootstrap.min.css')}}\" rel=\"stylesheet\">
        <link type=\"text/css\" href=\"{{asset('/B/bootstrap/css/bootstrap-responsive.min.css')}}\" rel=\"stylesheet\">
        <link type=\"text/css\" href=\"{{asset('/B/css/theme.css')}}\" rel=\"stylesheet\">
        <link type=\"text/css\" href=\"{{asset('/B/images/icons/css/font-awesome.css')}}\" rel=\"stylesheet\">
        <link type=\"text/css\" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600'
            rel='stylesheet'>
\t\t\t
\t\t  <link href=\"{{asset('/B/css/style.css')}}\" rel=\"stylesheet\">\t
\t\t\t
            {{ encore_entry_link_tags('app') }}
        {% endblock %}

        {% block javascripts %}
\t\t
\t\t  <!-- Libraries JS Files -->
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
  <script src=\"js/main.js\"></script>
\t\t
            {{ encore_entry_script_tags('app') }}
        {% endblock %}
    </head>
\t
\t
    <body>
\t        {% block header %}
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t\t<div class=\"navbar navbar-fixed-top\">
\t\t<div class=\"navbar-inner\">
\t\t\t<div class=\"container\">
\t\t\t\t<a class=\"btn btn-navbar\" data-toggle=\"collapse\" data-target=\".navbar-inverse-collapse\">
\t\t\t\t\t<i class=\"icon-reorder shaded\"></i>
\t\t\t\t</a>

\t\t\t  \t<a class=\"brand\" href=\"index.html\">
\t\t\t  \t\tEdmin
\t\t\t  \t</a>

\t\t\t\t<div class=\"nav-collapse collapse navbar-inverse-collapse\">
\t\t\t\t

\t\t\t\t\t<form class=\"navbar-search pull-left input-append\" action=\"#\">
\t\t\t\t\t\t<input type=\"text\" class=\"span3\">
\t\t\t\t\t\t<button class=\"btn\" type=\"button\">
\t\t\t\t\t\t\t<i class=\"icon-search\"></i>
\t\t\t\t\t\t</button>
\t\t\t\t\t</form>
\t\t\t\t
\t\t\t\t\t<ul class=\"nav pull-right\">
\t\t\t\t\t\t
\t\t\t\t\t\t
\t\t\t\t\t\t
\t\t\t\t\t\t<li class=\"nav-user dropdown\">
\t\t\t\t\t\t\t<a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
\t\t\t\t\t\t\t\t<img src=\"/B/media/user1.png\" class=\"nav-avatar\" />
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
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t\t\t\t\t<div class=\"span3\">
\t\t\t\t\t<div class=\"sidebar\">

\t\t\t\t\t\t<ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"ui-button-icon.html\"><i class=\"menu-icon icon-bold\"></i> Utilisateur </a></li>
                                <li><a href=\"charts.html\"><i class=\"menu-icon icon-bar-chart\"></i>Reclamation </a></li>
                                <li><a href=\"{{ path('app_article_index') }}\"><i class=\"menu-icon icon-book\"></i>Article </a></li>
                                <li><a href=\"{{ path('app_sujet_index') }}\"><i class=\"menu-icon icon-paste\"></i>Sujet </a></li>
                                <li><a href=\"table.html\"><i class=\"menu-icon icon-table\"></i>Produit </a></li>
                                <li><a href=\"charts.html\"><i class=\"menu-icon icon-bar-chart\"></i>Exercice </a></li>
                                <li><a href=\"charts.html\"><i class=\"menu-icon icon-bar-chart\"></i>Cour </a></li>
                                <li><a href=\"charts.html\"><i class=\"menu-icon icon-bar-chart\"></i>Categorie </a></li>
                                <li><a href=\"{{ path('app_employe_index') }}\"><i class=\"menu-icon icon-bar-chart\"></i>Employee </a></li>
                                <li><a href=\"{{ path('app_conge_index') }}\"><i class=\"menu-icon icon-bar-chart\"></i>Conge </a></li>
                                <li><a href=\"charts.html\"><i class=\"menu-icon icon-bar-chart\"></i>Commande </a></li>
                                <li><a href=\"charts.html\"><i class=\"menu-icon icon-bar-chart\"></i>Livraison </a></li>\t\t\t\t\t\t\t\t
                            </ul><!--/.widget-nav-->

\t\t\t\t\t\t<ul class=\"widget widget-menu unstyled\">
                                <li><a href=\"ui-button-icon.html\"><i class=\"menu-icon icon-bold\"></i> Buttons </a></li>
                                <li><a href=\"ui-typography.html\"><i class=\"menu-icon icon-book\"></i>Typography </a></li>
                                <li><a href=\"form.html\"><i class=\"menu-icon icon-paste\"></i>Forms </a></li>
                                <li><a href=\"table.html\"><i class=\"menu-icon icon-table\"></i>Tables </a></li>
                                <li><a href=\"charts.html\"><i class=\"menu-icon icon-bar-chart\"></i>Charts </a></li>
                            </ul><!--/.widget-nav-->

\t\t\t\t\t\t<ul class=\"widget widget-menu unstyled\">
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a class=\"collapsed\" data-toggle=\"collapse\" href=\"#togglePages\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon icon-cog\"></i>
\t\t\t\t\t\t\t\t\t<i class=\"icon-chevron-down pull-right\"></i><i class=\"icon-chevron-up pull-right\"></i>
\t\t\t\t\t\t\t\t\tMore Pages
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t<ul id=\"togglePages\" class=\"collapse unstyled\">
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a href=\"other-login.html\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"icon-inbox\"></i>
\t\t\t\t\t\t\t\t\t\t\tLogin
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a href=\"other-user-profile.html\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"icon-inbox\"></i>
\t\t\t\t\t\t\t\t\t\t\tProfile
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a href=\"other-user-listing.html\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"icon-inbox\"></i>
\t\t\t\t\t\t\t\t\t\t\tAll Users
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a href=\"#\">
\t\t\t\t\t\t\t\t\t<i class=\"menu-icon icon-signout\"></i>
\t\t\t\t\t\t\t\t\tLogout
\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t</ul>

\t\t\t\t\t</div><!--/.sidebar-->
\t\t\t\t</div><!--/.span3-->
\t\t\t
\t\t\t
\t\t\t
\t\t\t
\t\t\t<!--/header-->
\t\t\t{% endblock %}
\t
\t
\t
        {% block body %}
\t\t
\t\t{% endblock %}
    
\t</body>
\t
</html>
", "base2.html.twig", "C:\\xampp\\htdocs\\Athlon\\templates\\base2.html.twig");
    }
}
