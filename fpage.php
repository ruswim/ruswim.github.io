<!doctype html>
<html>
<head>
	<meta charset="utf-8"></meta>
<style>
	.sec{
		position: relative;
		top: 300px;
		left: 700px;
	}
.group 			  { 
  position:relative; 
  /*margin-bottom:45px;*/
  top:300px;
 left: 700px;
outline: 0;
    border-right: 2px solid #73AD21;
	border-left: 2px solid #73AD21;
	width: 350px;

}
input:-webkit-autofill{
  box-shadow:inset 0 0 0 1000px #fff;
}

.group input 				{
  font-size:18px;
  padding:10px 10px 10px 5px;
margin-top: 10px;
  display:inline;
  width:300px;
  border:none;
  border-bottom:1px solid #757575;
	outline: 0;
}
input:focus 		{ outline:0; }

/* LABEL ======================================= */
 .label1,.label2,.label3,.label4  				 {
  color:#999; 
  font-size:18px;
  font-weight:normal;
  position:absolute;
  pointer-events:none;
  left:5px;
  transition:0.2s ease all; 
  -moz-transition:0.2s ease all; 
  -webkit-transition:0.2s ease all;
}
	.label1 				 {
  top:15%;
}
 .label2 				 {
  top:39%;
}
	.label3 				 {
  top:63%;
}
	.label4				 {
  top:87%;
}

/* active state */
.input1:focus ~ .label1, .input1:valid ~ .label1 		{
  top:0;
  font-size:14px;
  color:#5264AE;
}
	
	.input2:focus ~ .label2, .input2:valid ~ .label2 		{
  top:25%;
  font-size:14px;
  color:#5264AE;
}
	.input3:focus ~ .label3, .input3:valid ~ .label3 		{
  top:50%;
  font-size:14px;
  color:#5264AE;
}
	
	.input4:focus ~ .label4, .input4:valid ~ .label4 		{
  top:75%;
  font-size:14px;
  color:#5264AE;
}

 /*BOTTOM BARS ================================= */
.bar,.bar2,.bar3,.bar4 	{ position:relative; display:block; width:300px; }
.bar:before, .bar:after ,.bar2:before, .bar2:after,.bar3:before, .bar3:after ,.bar4:before, .bar4:after  	{
  content:'';
  height:2px; 
  width:0;
  bottom:1px; 
  position:absolute;
  background:#5264AE; 
  transition:0.2s ease all; 
  -moz-transition:0.2s ease all; 
  -webkit-transition:0.2s ease all;
}
.bar:before,.bar2:before,.bar3:before,.bar4:before {
  left:50%;
}
.bar:after,.bar2:after,.bar3:after,.bar4:after {
  right:50%; 
}

/* active state */
.input1:focus ~ .bar:before, .input1:focus ~ .bar:after ,  .input2:focus ~ .bar2:before, .input2:focus ~ .bar2:after,  .input3:focus ~ .bar3:before, .input3:focus ~ .bar3:after,  .input4:focus ~ .bar4:before, .input4:focus ~ .bar4:after{
  width:50%;
}

/* HIGHLIGHTER ================================== */
.highlight,.highlight2,.highlight3,.highlight4 {
  position:absolute;
  height:60%; 
  width:100px; 
  /*top:25%;*/ 
  left:0;
  pointer-events:none;
  opacity:0.5;
}

/* active state */
.input1:focus ~ .highlight , .input2:focus ~ .highlight2,.input3:focus ~ .highlight3 , .input4:focus ~ .highlight4 {
  -webkit-animation:inputHighlighter 0.3s ease;
  -moz-animation:inputHighlighter 0.3s ease;
  animation:inputHighlighter 0.3s ease;
}

/* ANIMATIONS ================ */
@-webkit-keyframes inputHighlighter {
	from { /*background:#5264AE;*/ }
  to 	{ width:0; background:transparent; }
}
@-moz-keyframes inputHighlighter {
	from { /*background:#5264AE;*/ }
  to 	{ width:0; background:transparent; }
}
@keyframes inputHighlighter {
	from { /*background:#5264AE; */}
  to 	{ width:0; background:transparent; }
}
	
</style>	
</head>
<body>
	
<div class="group">   
	<form name="form3" action="stats.php" method="POST" class="lok">
      <input name = "name" class="input1" type="text" required>
      <span class="highlight"></span>
      <span class="bar"></span>
      <label class="label1">Имя</label>
<input name = "surname" class="input2" type="text" required>
      <span class="highlight2"></span>
      <span class="bar2"></span>
      <label class="label2">Фамилия</label>
					<input name = "age" class="input3" type="text" required>
      <span class="highlight3"></span>
      <span class="bar3"></span>
      <label class="label3">Год рождения</label>
	 <input  name = "coacher" class="input4" type="text" required>
      <span class="highlight4"></span>
      <span class="bar4"></span>
      <label class="label4">Тренер (Ф И)</label>
</div>				
	<div class="sec">
<select id="dis" name="dis">
    <option disabled>Выберите дистанцию</option>
    <option value="50 вольный">50м вольный</option>
    <option value="100 вольный">100м вольный</option>
    <option value="200 вольный">200м вольный</option>
	<option value="400 вольный">400м вольный</option>
    <option value="800 вольный">800м вольный</option>
    <option value="1500 вольный">1500м вольный</option>
	<option value="50 на спине">50м на спине</option>
    <option value="100 на спине">100м на спине</option>
    <option value="200 на спине">200м на спине</option>
	<option value="50 баттерфляй">50м баттерфляй</option>
    <option value="100 баттерфляй">100м баттерфляй</option>
    <option value="200 баттерфляй">200м баттерфляй</option>
	<option value="100 комплексное плвание">100м комплексное плавание</option>
    <option value="200 комплексное плвание">200м комплексное плавание</option>
    <option value="400 комплексное плвание">400м комплексное плавание</option>
	</select> 	<br>	
<input type="radio" name="type" value="50">50m<br>
<input type="radio" name="type" value="25">25m<br> 
<input type='submit' id = 'button' value='Найти'>
		</div>
</form>
</body>
</html>