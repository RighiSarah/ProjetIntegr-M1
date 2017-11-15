<?php

/* AssoChifaaBundle:Default:Contact.html.twig */
class __TwigTemplate_fcc5ae9d5b14d71bce45cbcead0b4349107f40e5266ec2879bc06527fc29865a extends Twig_Template
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

    // line 2
    public function block_body($context, array $blocks = array())
    {
        // line 3
        echo " <div class=\"contact\">
            <!--Contact-->
            <h1>Contact</h1>
            <!--Adress-->
            <adress>
                Association CHIFAA<br/>
                <br/>
                4 Rue Victor Considerant<br/>
                69150 D&eacute;cines-Charpieu<br/>
                Lyon France<br/>
            </adress>
            <!--Tel-->
            <p>Tél : 06 15 74 89 37</p>
            
        <div class=\"sendmail\">
                <form  action=\"\" method=\"POST\" enctype=\"multipart/form-data\">
                    <div class=\"container\">
                        <input type=\"hidden\" name=\"action\" value=\"submit\">
                            Nom et pr&eacute;nom:<br>
                        <input name=\"name\" type=\"text\" value=\"\" size=\"30\"/><br>
                            Adresse mail:<br>
                        <input name=\"email\" type=\"text\" value=\"\" size=\"30\"/><br>
                            Votre message:<br>
                        <textarea name=\"message\" rows=\"10\" cols=\"60\"></textarea><br>
                        <input type=\"submit\" value=\"Envoyer message\" name=\"envoie\" />
                    </div>
                </form>
           
        </div>
 </div>       
    <script>
                    function initMap() {
                      var uluru = {lat: 45.774808, lng: 4.956233};
                      var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 17,
                        center: uluru
                      });
                      var marker = new google.maps.Marker({
                        position: uluru,
                        map: map
                      });
                    }
 </script>

<script async defer
    src=\"https://maps.googleapis.com/maps/api/js?key=AIzaSyA9bMXs_ExyQdIIBEjRzs2uK_gmDJ4Qgwk&callback=initMap\">
</script>
";
    }

    public function getTemplateName()
    {
        return "AssoChifaaBundle:Default:Contact.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 3,  28 => 2,);
    }
}
