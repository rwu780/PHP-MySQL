<?php 
	session_start();

	// $quizSource = $_SESSION['quizSource'];
	// $lectureSource = $_SESSION['lectureSource'];
	$quizSource = "Material/COMP466/quiz.xml";
	$lectureSource = "Material/COMP466/course.xml";

	$quizXML = simplexml_load_file($quizSource);
	$lectureXML = simplexml_load_file($lectureSource);

 ?>