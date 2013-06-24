<?php

/* BbiTmanagerBundle:Item:index.html.twig */
class __TwigTemplate_e4490a2297517b15837c33f18ee09cf2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "<h1>Itens do Segmento</h1>

<ul>
    <li>
        <a href=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("item_new"), "html", null, true);
        echo "\">
            Create a new entry
        </a>
    </li>
</ul>

<select id=\"cats\">
    ";
        // line 15
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "entitiescat"));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 16
            echo "    <option value=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("item", array("cat" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
            echo "\">
        ";
            // line 17
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "segmento"), "html", null, true);
            echo "
    </option>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 20
        echo "</select>

<table class=\"records_list\">
    <thead>
        <tr>
            <th>Id</th>
            <th>Titulo</th>
            <th>Link</th> 
            <th>Actions</th>
        </tr>
    </thead>
    ";
        // line 31
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "entities"));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 32
            echo "    <tr>
        <td><a href=\"";
            // line 33
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("item_show", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "id"), "html", null, true);
            echo "</a></td>
        <td>";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "titulo"), "html", null, true);
            echo "</td>
        <td>";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "link"), "html", null, true);
            echo "</td> 
        <td>
            <ul>
                <li>

                    <a href=\"";
            // line 40
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("item_show", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
            echo "\">show</a>
                </li>
                    <li>
                    <a href=\"";
            // line 43
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("item_edit", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
            echo "\">
                    <i class=\"icon-edit\"></i>Editar</a>
                </li>
            </ul>
        </td>
    </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 50
        echo "</table>

<script type=\"text/javascript\">
/*
   \$('#cats').bind('change', function () { // bind change event to select
        var url = \$(this).val(); // get selected value
        if (url != '') { // require a URL
            window.location = url; // redirect
        }
        return false;
    });*/
</script>

";
    }

    public function getTemplateName()
    {
        return "BbiTmanagerBundle:Item:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 50,  109 => 43,  103 => 40,  95 => 35,  91 => 34,  85 => 33,  82 => 32,  78 => 31,  65 => 20,  56 => 17,  51 => 16,  47 => 15,  37 => 8,  31 => 4,  28 => 3,);
    }
}
