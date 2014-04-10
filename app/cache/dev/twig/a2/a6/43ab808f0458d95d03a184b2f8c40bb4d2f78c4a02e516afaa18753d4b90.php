<?php

/* MedAjaxBundle:Default:index.html.twig */
class __TwigTemplate_a2a643ab808f0458d95d03a184b2f8c40bb4d2f78c4a02e516afaa18753d4b90 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
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

    // line 2
    public function block_body($context, array $blocks = array())
    {
        // line 3
        echo "<div class=\"container\">
<div class=\"row span10 offset2\">
        <div class=\"col col-lg-4 col-offset-2\">
            <input type=\"text\" name=\"name\" id=\"name\" class=\"form-control\" value=\"\">
        </div>
        <div class=\"col col-lg-1\" id=\"loading\"></div>
    </div>
    <div id=\"names\"></div>
</div>
";
    }

    // line 13
    public function block_javascripts($context, array $blocks = array())
    {
        // line 14
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
<script type=\"text/javascript\">
    \$(function() {
        alert();
        \$('#name').keyup(function(event) {
            var val = \$(this).val();
            if (\$(this).val().length>0) {
                \$.ajax({
                  type: \"POST\",
                  url: '";
        // line 23
        echo $this->env->getExtension('routing')->getPath("med_ajax_ajaxcall");
        echo "',
                  data: 'token='+val,

                  beforeSend:function(event, position, total, percentComplete){
                    \$('#names').html('');
                    \$('#loading').html('<h3>Loading</h3>');
                },
                success:function(html){
                   \$('#loading').html('');
                   \$('#names').html(html);

               }
           },\"json\");
            }else{
                \$('#names').html('');
            }
        });
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "MedAjaxBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 23,  48 => 14,  45 => 13,  32 => 3,  29 => 2,);
    }
}
