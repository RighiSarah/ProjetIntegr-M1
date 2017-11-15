<?php

/* ::base.html.twig */
class __TwigTemplate_b699a3b8a4be2948b08afbf946a65e38cec6954244b5f644fa2c4d6f4d560dc5 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
       
        <title>";
        // line 6
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 7
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 15
        echo "        ";
        echo "   
        <link rel=\"icon\" type=\"image/png\" href=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/jbnetbootstraptheme/images/favicon.png"), "html", null, true);
        echo "\" />#
    </head>   
       <!-- banner -->
<div class=\"navigation\">
                 <div class=\"logo\">
\t\t\t\t<a href=\"index.html\"><img src=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/jbnetbootstraptheme/images/logo2.png"), "html", null, true);
        echo "\" alt=\"Chifaa\"></a>
\t    \t </div>

\t    \t <div class=\"menu\">
\t    \t \t<div class=\"dropdown\">
\t\t\t\t  <a href=\"#\">PRÉSENTATION</a>
\t\t\t\t  <div class=\"dropdown-content\">
\t\t\t\t      <a href=\"#\">Principe</a>
\t\t\t\t      <a href=\"#\">Valeurs</a>
\t\t\t\t      <a href=\"#\">Nos actions</a>
\t\t\t\t      <a href=\"#\">Qui sommes-nous ?</a>
\t\t\t\t  </div>
\t\t\t\t</div>

\t\t\t\t<div class=\"dropdown\">
\t\t\t\t\t<a href=\"#\">AIDEZ-NOUS</a>
\t\t\t\t\t<div class=\"dropdown-content\">
\t\t\t\t\t\t<a href=\"#\">Prévoir une visite</a>
\t\t\t\t\t\t<a href=\"#\">Devenir bénévole</a>
\t\t\t\t    </div>
\t\t\t\t</div>
\t\t\t\t <a href=\"";
        // line 42
        echo $this->env->getExtension('routing')->getPath("Contact");
        echo "\">CONTACT</a>
\t\t\t\t<a href=\"#\">PARTENAIRES</a>
\t    \t </div>\t

\t<div class=\"banner\" id=\"home\">
\t\t<div class=\"banner-content\">
\t\t\t<h1>Chifaa</h1>
\t\t\t<h2>Association Humanitaire</h2>
\t\t</div>
\t</div>
</div>
<a href=\"#\" id=\"toTop\" style=\"display: inline;\"><span id=\"toTopHover\"></span>To Top</a> <!-- Aller vers le haut -->
        ";
        // line 54
        $this->displayBlock('body', $context, $blocks);
        // line 55
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 95
        echo "<a>Mentions l&eacute;gales</a>
<a>A propos</a>
<a>Plan du site</a>
<a href=\"#page\">Haut de page</a>
</html>
";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo "Chiffa";
    }

    // line 7
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 8
        echo "         ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "efc0157_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_efc0157_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/efc0157_bootstrap.min_1.css");
            // line 9
            echo "          <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
        ";
        } else {
            // asset "efc0157"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_efc0157") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/efc0157.css");
            echo "          <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
        ";
        }
        unset($context["asset_url"]);
        // line 11
        echo "        ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "4d2aa3f_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4d2aa3f_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/4d2aa3f_style_1.css");
            // line 12
            echo "          <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
        ";
        } else {
            // asset "4d2aa3f"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4d2aa3f") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/4d2aa3f.css");
            echo "          <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
        ";
        }
        unset($context["asset_url"]);
        // line 14
        echo "        ";
    }

    // line 54
    public function block_body($context, array $blocks = array())
    {
    }

    // line 55
    public function block_javascripts($context, array $blocks = array())
    {
        // line 56
        echo "        ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "35b0a2d_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_35b0a2d_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/35b0a2d_jquery-3.2.1.min_1.js");
            // line 57
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        } else {
            // asset "35b0a2d"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_35b0a2d") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/35b0a2d.js");
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        }
        unset($context["asset_url"]);
        // line 59
        echo "        ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "ce8814b_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ce8814b_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/ce8814b_bootstrap.min_1.js");
            // line 60
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        } else {
            // asset "ce8814b"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_ce8814b") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/ce8814b.js");
            echo "                <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        }
        unset($context["asset_url"]);
        // line 62
        echo "                
<script type=\"text/javascript\">
\$(function() {
  var banner = \$('.banner');
  var backgrounds = [\"";
        // line 66
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/jbnetbootstraptheme/images/image1.png"), "html", null, true);
        echo "\",'url(https://placehold.it/1200x800)','url(https://placehold.it/1200x801)'];
  var current = 0; // Index image courrante // background[0] = images/image1.pn 0 => 2

function nextBackground() {
  // .css('parametre', 'valeur')
  banner.css(
   'background',
    backgrounds[current = ++current % backgrounds.length]+' no-repeat' // background : url(images/image1.png) no-repeat;
 );

 banner.css('background-size', 'cover');

 setTimeout(nextBackground, 5000);
 }

 
 setTimeout(nextBackground, 5000); // 5s 

   banner.css('background', backgrounds[0]+' no-repeat');
   banner.css('background-size', 'cover');
 });
</script>
<script type=\"text/javascript\">
\t\$(function() {
\t\t\$('.banner-content h1').fadeIn(3000);
\t\t\$('.banner-content h2').fadeIn(4000);
\t});
</script>  
  ";
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  204 => 66,  198 => 62,  184 => 60,  179 => 59,  165 => 57,  160 => 56,  157 => 55,  152 => 54,  148 => 14,  134 => 12,  129 => 11,  115 => 9,  110 => 8,  107 => 7,  101 => 6,  92 => 95,  89 => 55,  87 => 54,  72 => 42,  48 => 21,  40 => 16,  36 => 15,  34 => 7,  30 => 6,  23 => 1,);
    }
}
