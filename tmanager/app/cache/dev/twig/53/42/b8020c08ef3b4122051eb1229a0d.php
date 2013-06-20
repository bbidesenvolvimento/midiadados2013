<?php

/* ::base.html.twig */
class __TwigTemplate_5342b8020c08ef3b4122051eb1229a0d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'javascripts' => array($this, 'block_javascripts'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('javascripts', $context, $blocks);
        // line 6
        echo "
";
        // line 7
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 12
        echo "
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <title>";
        // line 17
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    </head>
    <body>

        <div id=\"content\">
            ";
        // line 22
        $this->displayBlock('body', $context, $blocks);
        // line 23
        echo "        </div>
    </body>
</html>";
    }

    // line 1
    public function block_javascripts($context, array $blocks = array())
    {
        // line 2
        echo "  ";
        // asset "06837fc"
        $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_06837fc") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/06837fc.js");
        // line 3
        echo "     <script src=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
        echo "\"></script>
  ";
        unset($context["asset_url"]);
    }

    // line 7
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 8
        echo "  ";
        // asset "425e28c"
        $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_425e28c") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/425e28c.css");
        // line 9
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->getContext($context, "asset_url"), "html", null, true);
        echo "\" type=\"text/css\" rel=\"stylesheet\" />
 ";
        unset($context["asset_url"]);
    }

    // line 17
    public function block_title($context, array $blocks = array())
    {
        echo "Test Application";
    }

    // line 22
    public function block_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  89 => 22,  83 => 17,  75 => 9,  71 => 8,  68 => 7,  60 => 3,  56 => 2,  53 => 1,  47 => 23,  45 => 22,  37 => 17,  30 => 12,  28 => 7,  25 => 6,  23 => 1,);
    }
}
