<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

$document = JFactory::getDocument();

$document->addStyleSheet('media/com_nemateria/css/flexslider.css');

$document->addScript('media/com_nemateria/js/jquery.mousewheel.js');
$document->addScript('media/com_nemateria/js/jquery.easing.js');
$document->addScript('media/com_nemateria/js/jquery.flexslider.js');
$document->addScript('media/com_nemateria/js/flexslider.init.js');

// $document->addScript('media/com_nemateria/js/nemateria.series.js');

?>
<section id="attente">
    <div class="conteneur">
        <div class="loader"></div>
    </div>
</section>
<div class="componentheading<?php echo $this->escape($this->get('pageclass_sfx')); ?>"><h2><?php echo $this->params->get('page_title');  ?></h2></div>

<main id="recherche">
    <header id="series">
        <?php foreach ($this->series as $s): ?>
        <a href="<?php echo NemateriaHelperUtils::setSerieUrl(JUri::getInstance(), $s);?>" title="<?php echo $s; ?>" class="<?php echo NemateriaHelperUtils::setSerieClasse(urldecode(JUri::getInstance()), $s); ?>" ><?php echo $s; ?></a>
        <?php endforeach; ?>
    </header>
    <section class="slider">
        <div id="slider" class="flexslider">
            <ul class="slides">
			<?php foreach ($this->items as $i => $item) : 
				//you may want to do this anywhere else				
				$item->slug	= $item->alias ? ($item->id_notice.':'.$item->alias) : $item->id_notice;
				$link = JRoute::_('index.php?option=com_nemateria&view=notice&id_notice='. $item->slug);
				// TRAITER LES METADONNEES DEPUIS LE CHAMP... CHAMPS
				$metadiverses = NemateriaHelperUtils::set_variables($item->champs);
				// RECUPERER LES SEQUENCES
				$liens = NemateriaHelperUtils::identifiant_lien($item->identifier);
				?>
			    <li>
                <!-- AFFICHER LE MEDIA 
                //  data-lightbox="image-1" data-title="My caption"-->
                <a href="<?php  echo $liens[1]; ?>" data-lightbox="group:serie-<?php if ($i!=0) echo $serie_actuelle->title; ?>" data-title="<?php echo $item->creator; ?>" >
                        
                <img id="img_<?php  echo $item->id_notice; ?>" class="lazy" data-src="<?php echo $liens[1]; ?>"/>
                    
                </a>
                <!-- AFFICHER LES INFOS --> 
                <div class="infos" data="<?php echo $item->id_notice; ?>">
                    <div class="tabs">
                          <ul class="tab-links">
                            <li class="active"><a href="#media_<?php echo $item->id_notice; ?>">Infos sur l'image</a></li>
                            <li><a href="#collection_<?php echo $item->id_notice; ?>">Infos sur la série</a></li>
                            <li><a href="#commenter_<?php echo $item->id_notice; ?>">Vos contributions</a></li>
                          </ul>
                          <!-- -->
                          <div class="tab-content">
                              <div id="media_<?php echo $item->id_notice; ?>" class="tab active">
                            <h3><a href="<?php echo $link ?>">
                                  <?php  echo $item->title; ?>
                                  </a></h3>
                                  <p>
                                    <?php echo $item->description;// echo set_texte($item->description, 300);  ?>
                                  </p>
                                  <ul>
                                    <?php
                                      if(isset($item->creator)):
                                    ?>
                                      <li><span class='bleu'>Auteur</span> : <?php echo $item->creator; ?></li>
                                    <?php
                                      endif;
                                    ?>
                                      
                                    <?php
                                      if(isset($item->date)):
                                    ?>
                                      <li><span class='bleu'>Date</span> : <?php echo $item->date; ?></li>
                                    <?php
                                      endif;
                                    ?>
                                    
                                    <?php
                                      if(isset($metadiverses['accrualPeriodicity'])):
                                    ?>
                                      <li><span class='bleu'>Lieu</span> : <?php echo $metadiverses['accrualPeriodicity'].' ('.$metadiverses['accrualMethod'].')'; ?></li>
                                    <?php
                                      endif;
                                    ?>
                                    
                                    <?php
                                      if(isset($liens[0])):
                                    ?>
                                      <li><span class='bleu'>Référence</span> : <?php echo $liens[0]; ?></li>
                                    <?php
                                      endif;
                                    ?>
                                    
                                    <?php
                                      if(isset($item->subject)):
                                    ?>
                                      <li><span class='bleu'>Mots clés</span> : <?php echo $item->subject; // echo substr($tmp, 0, $tmp.length-2); ?></li>
                                    <?php
                                      endif;
                                    ?>
                                    
                                    <?php
                                      if(isset($metadiverses['medium'])):
                                    ?>
                                      <li><span class='bleu'>Nature du support original</span> : <?php echo $metadiverses['medium']; ?></li>
                                    <?php
                                      endif;
                                    ?>
                                    
                                    <?php
                                      if(isset($metadiverses['extent'])):
                                    ?>
                                      <li><span class='bleu'>Caractéristique de l'original</span> : <?php echo $metadiverses['extent']; ?></li>
                                    <?php
                                      endif;
                                    ?>
                                    
                                    <?php
                                      if(isset($metadiverses['hasFormat'])):
                                    ?>
                                      <li><span class='bleu'>Format du master num</span> : <?php echo $metadiverses['hasFormat']; ?></li>
                                    <?php
                                      endif;
                                    ?>
                                      
                                    <?php
                                      if(isset($metadiverses['dateCopyrighted'])):
                                    ?>
                                      <li><span class='bleu'>Propriétaire</span> : <?php echo $metadiverses['dateCopyrighted']; ?></li>
                                    <?php
                                      endif;
                                    ?>
                                    
                                    <?php
                                      if(isset($item->publisher)):
                                    ?>
                                      <li><span class='bleu'>Editeur</span> : <?php echo $item->publisher; ?></li>
                                    <?php
                                      endif;
                                    ?>
                                    
                                    <?php
                                      if(isset($metadiverses['rightsHolder'])):
                                    ?>
                                      <li><span class='bleu'>Détenteur des droits</span> : <?php echo $metadiverses['rightsHolder']; ?></li>
                                    <?php
                                      endif;
                                    ?>
                                    
                                    <?php
                                      if(isset($item->rights)):
                                    ?>
                                      <li><span class='bleu'>Statut juridique</span> : <?php echo $item->rights; ?></li>
                                    <?php
                                      endif;
                                    ?> 
                                      
                                </ul>
                                <!--<h4>Description</h4>-->
                                <?php // echo $item->description; ?>
                          </div>
                        <!-- -->
                          <div id="collection_<?php echo $item->id_notice; ?>" class="tab">
                            <h3><?php echo $serie_actuelle->title; ?></h3>
                            <p><?php echo $serie_actuelle->description; ?></p>
                          </div>
                          <!-- Ajout d'un formulaire pour les commentaires -->
                              <div id="commenter_<?php echo $item->id_notice; ?>" class="tab">
                                
                                <script language="javascript" type="text/javascript">
                                    jQuery(".formBody #Notice").val('<?php echo rtrim ($liens[0]); ?>');
                                </script>
                              </div>
                          </div>
                         <!-- -->
                    </div>
                  </div>
                </li>
		    <?php endforeach; ?>
	        </ul>
        </div>
        </section>
        <!-- NAVIGATION PAR LES VIGNETTES -->
        <div id="carousel" class="flexslider">
            <ul class="slides">
                <?php foreach ($this->items as $i => $item) : ?>
                <?php // RECUPERER LES SEQUENCES
				    $liens_img = NemateriaHelperUtils::identifiant_lien($item->identifier);
                ?>
                <li>
                    <img class="lazy" data-src="<?php echo $liens_img[1]; ?>"/>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
</main>