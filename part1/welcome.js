
function getURL(){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			document.getElementById("displayURL").innerHTML = this.responseText;
		}
	}
	xmlhttp.open("GET", "getUrls.php?", true);
	xmlhttp.send();
}

function checkURL(str){
	var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
	var request;
	if(window.XMLHttpRequest){
		request = new XMLHttpRequest();
	}
	else{
		request = new ActiveXObject("Microsoft.XMLHTTP");
	}
	request.open('GET', str);
	request.send();

	if(request.status === 404 && !regexp.test(str)){
		return false;
	}
	return true;

}

function addURL() {
	var newURL = prompt("Please enter a URL(including the protocals)");
	if(newURL == null || newURL == '' || checkURL(newURL) == false){
		alert("You did not eneter a valid URL");
	}
	else{
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				getURL();
			}
		}
		xmlhttp.open("GET", "addURL.php?new=" + newURL, true);
		xmlhttp.send();
	}
}

function editURL(){
	var urls = document.getElementsByName("urls");
	var selected = ''
	var multipleSelected = false;

	for (var i = 0; i < urls.length; i++) {
		if(urls[i].checked == true){
			if(selected == ''){
				selected = urls[i].value;
			}else{
				urls[i].checked = false;
				alert("Only select one bookmark to change");
				multipleSelected = true;
				return;
			}
		}
	}
	if (multipleSelected == true) {
		return;
	}	
	if (selected == '') {
		alert("You did not select a bookmark to edit");
		return;
	}

	var newURL = prompt("Please enter a URL(including the protocals)");
	if(newURL == null || newURL == ''){
		alert("You did not eneter anything");
	}
	if(checkURL(newURL) == false){
		alert("You need to enter a valid URL");
	}
	else{
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				getURL();

			}
		}
		xmlhttp.open("GET", "editURL.php?old=" + selected + "&new="+newURL, true);
		xmlhttp.send();
	}
}






