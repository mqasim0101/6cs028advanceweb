<?php
/*session_start();
     include("website_connect.php"); //  connects to database:
     include("navigation_bar.php"); // connects to website navigation bar:#

     
     ---------------------------------------------------------------------------------------------------------------------------------------------
     Table: users
     ---------------------------------------------------------------------------------------------------------------------------------------------
     1	id Primary	int(11)		AUTO_INCREMENT
	 2	user_id	int(11)	
	 3	user_name	varchar(255)	utf8mb4_general_ci
	 4	password	text	utf8mb4_general_ci
	 5	type	int(11)	
	 6	date	timestamp	
     ------------------------------------------------------------------------------------------------------------------------------------------------
     Table: articles
     ------------------------------------------------------------------------------------------------------------------------------------------------
     id Primary	int(11)		AUTO_INCREMENT	
	2	article_name	varchar(255)	utf8mb4_general_ci
	3	article_overview	text	utf8mb4_general_ci
	4	article_description	text	utf8mb4_general_ci
	5	article_author	varchar(255)	utf8mb4_general_ci
	6	date	timestamp			No	current_timestamp()		ON UPDATE CURRENT_TIMESTAMP()
    -------------------------------------------------------------------------------------------------------------------------------------------------
     Table: livesearch
     -------------------------------------------------------------------------------------------------------------------------------------------------
     1	id Primary	int(11)		AUTO_INCREMENT
	 2	article_name_live	text	utf8mb4_general_ci
	 3	date	timestamp			No	current_timestamp()		ON UPDATE CURRENT_TIMESTAMP()
     -------------------------------------------------------------------------------------------------------------------------------------------------
     Table: Support
     -------------------------------------------------------------------------------------------------------------------------------------------------
     1	id Primary	int(11)
	2	user_contacted	varchar(255)	utf8mb4_general_ci
	3	query_or_question	text	utf8mb4_general_ci
	4	type	varchar(100)	utf8mb4_general_ci
	5	date	timestamp			No	current_timestamp()	ON UPDATE CURRENT_TIMESTAMP()
     -------------------------------------------------------------------------------------------------------------------------------------------------
     Table: website_survey
     -------------------------------------------------------------------------------------------------------------------------------------------------
     1	id Primary	int(11)			AUTO_INCREMENT	
	2	website_layout	text	utf8mb4_general_ci
	3	website_functionality	text	utf8mb4_general_ci
	4	website_design	text	utf8mb4_general_ci
	5	website_animation	text	utf8mb4_general_ci
	6	comments	text	utf8mb4_general_ci
	7	date	timestamp			No	current_timestamp()		ON UPDATE CURRENT_TIMESTAMP()
     -------------------------------------------------------------------------------------------------------------------------------------------------
     Table: website_review
     -------------------------------------------------------------------------------------------------------------------------------------------------
     1	id Primary	int(11)			AUTO_INCREMENT	
	2	website_design	text	utf8mb4_general_ci
	3	website_layout	text	utf8mb4_general_ci
	4	website_animations	text	utf8mb4_general_ci
	5	website_functionality	text	utf8mb4_general_ci
	6	website_interface	text	utf8mb4_general_ci
     --------------------------------------------------------------------------------------------------------------------------------------------------
     Table: email_reports
     --------------------------------------------------------------------------------------------------------------------------------------------------
     1	email_id Primary	int(11)					AUTO_INCREMENT	
	2	sender_email_address	varchar(255)	utf8mb4_general_ci	
	3	email_subject	varchar(255)	utf8mb4_general_ci	
	4	email_content	text	utf8mb4_general_ci	
	5	email_author	varchar(255)	utf8mb4_general_ci	
	6	email_type	text	utf8mb4_general_ci	
	7	date	timestamp			No	current_timestamp()		ON UPDATE CURRENT_TIMESTAMP()
    ---------------------------------------------------------------------------------------------------------------------------------------------------
    Table: website_log
    ---------------------------------------------------------------------------------------------------------------------------------------------------
    1	id Primary	int(11)					AUTO_INCREMENT	
	2	total_users	int(11)		
	3	total_revenue	text	utf8mb4_general_ci	
	4	date	timestamp			No	current_timestamp()		ON UPDATE CURRENT_TIMESTAMP()
    ----------------------------------------------------------------------------------------------------------------------------------------------------
    Table: searchbar
    ----------------------------------------------------------------------------------------------------------------------------------------------------
    1	id Primary	int(11)					AUTO_INCREMENT	
	2	article_name	text	utf8mb4_general_ci			
	3	date	timestamp			No	current_timestamp()		ON UPDATE CURRENT_TIMESTAMP()
    ----------------------------------------------------------------------------------------------------------------------------------------------------
    Table: boss_website
    ----------------------------------------------------------------------------------------------------------------------------------------------------
     */

?>