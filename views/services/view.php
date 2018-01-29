<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Services */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Услуги', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product">
			<div class="container">
		<div class="col-md-3 product-bottom ">
			<!--categories-->
			<div class="categories animated wow fadeInUp animated" data-wow-delay=".5s" >
                <h3>Категории</h3>
                
                <ul class="cate">
                    <?php foreach ($categories as $key => $category):?>
                    <li><i class="glyphicon glyphicon-menu-right" ></i><a href="<?= \yii\helpers\Url::toRoute(['services/index','category'=>$key]) ?>"><?= $category ?></a></li>
                    <?php endforeach;?>
                </ul>
            </div>
                </div>
		<!--//menu-->
		<!--price-->
				
			<div class="col-md-9 animated wow fadeInRight" data-wow-delay=".5s">
	
<div class="col-md-7 single-top-in">
						<div class="span_2_of_a1 simpleCart_shelfItem">
				<h3><?= $model->title ?></h3>
				<p class="in-para">Вы можите воспользоваться данной услугой связавшись с парикмахером</p>
			    <div class="price_single">
				  <span class="reducedfrom item_price">$<?= $model->price ?></span>
				
				 <div class="clearfix"></div>
				</div>
				
				 
			   
			<div class="clearfix"> </div>
			</div>
		   <!----- tabs-box ---->
		<div class="sap_tabs">	
				     <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
						  <ul class="resp-tabs-list">
						  	  <li class="resp-tab-item " aria-controls="tab_item-0" role="tab"><span>Описание услуги</span></li>
							  <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Дополнительная информация</span></li>
							  <div class="clearfix"></div>
						  </ul>				  	 
							<div class="resp-tabs-container">
							    <h2 class="resp-accordion resp-tab-active" role="tab" aria-controls="tab_item-0"><span class="resp-arrow"></span>Product Description</h2><div class="tab-1 resp-tab-content resp-tab-content-active" aria-labelledby="tab_item-0" style="display:block">
									<div class="facts">
									  <?= $model->description ?>  
							        </div>

							    	</div>
							      <h2 class="resp-accordion" role="tab" aria-controls="tab_item-1"><span class="resp-arrow"></span>Additional Information</h2><div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
										<div class="facts1">
					
						<div class="color"><p>Дата создания</p>
							<span ><?= $model->dateCreating ?></span>
							<div class="clearfix"></div>
						</div>
						<div class="color">
							<p>Категория</p>
							<span ><?= $model->serviceCategories->title ?></span>
							<div class="clearfix"></div>
						</div>
					        <div class="color">
							<p>Парикмахер</p>
							<span ><?= $model->hairdressers->users->username ?></span>
							<div class="clearfix"></div>
						</div>
					        
			 </div>

								</div>									
			
								


							 </div>
					      </div>
					 </div>
					 <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
		    <script type="text/javascript">
			    $(document).ready(function () {
			        $('#horizontalTab').easyResponsiveTabs({
			            type: 'default', //Types: default, vertical, accordion           
			            width: 'auto', //auto or any width like 600px
			            fit: true   // 100% fit in a container
			        });
			    });
			   </script>	
<!---->
					</div>
			
</div>
<!----->
<div class="clearfix"> </div>

			</div>			
		</div>
</div>