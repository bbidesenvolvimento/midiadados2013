<?php

/* BbiTmanagerBundle:Item:jsonlista.html.twig */
class __TwigTemplate_dfbb3a9f8f53bab2f7161d1e5b61e080 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<h1>Json list</h1>

<table class=\"records_list\">
    <!--thead>
        <tr>
            <th>Titulo</th>
            <th>Link</th> 
            <th>Categoria</th>
        </tr>
    </thead-->
    <tbody>
    ";
        // line 12
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "entities"));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 13
            echo "        <tr>
            <td>";
            // line 14
            echo "</td>
            <td>";
            // line 15
            echo "</td> 
            <td>";
            // line 16
            echo "</td> 
        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 19
        echo "    </tbody>

 

    ";
        // line 23
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable($this->getContext($context, "categorias"));
        foreach ($context['_seq'] as $context["_key"] => $context["categoria"]) {
            // line 24
            echo "        <tr>
            <td>";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "categoria"), "nome"), "html", null, true);
            echo "</td>
 

        </tr>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['categoria'], $context['_parent'], $context['loop']);
        $context = array_merge($_parent, array_intersect_key($context, $_parent));
        // line 30
        echo "
</table>
 ";
    }

    public function getTemplateName()
    {
        return "BbiTmanagerBundle:Item:jsonlista.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 30,  66 => 25,  63 => 24,  59 => 23,  53 => 19,  45 => 16,  42 => 15,  39 => 14,  36 => 13,  32 => 12,  19 => 1,);
    }
}
