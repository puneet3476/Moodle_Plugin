$(document).ready(function(){

	
	$.ajax({
		 url:'./controller.php',
		 type: 'POST',
		 data:{
			 functionname: 'leaders'
		 },
		 success: function(response){
		 var arr = response.split(',');
 var odd = new Array(arr.length/3);
		 var even = new Array(arr.length/3 );
		 var third = new Array(arr.length/3);
		 var x=0,y=0,z=0;
			 for(var i=0;i<arr.length;i++)
			 {
				 if(arr[i][0] == '['){
					 arr[i]=arr[i].slice(1);
				 }
				 if(arr[i][arr[i].length-1] == ']'){
					 arr[i]=arr[i].slice(0,arr[i].length-1);
				 }
				 var b=arr[i].replace(/\"/g,'');
				 b=b.replace('[','');
				 //$('#'+(i+1)).html(b);
				 if (i%3==0)
				  {
					  even[x] = b;
					  x = x+1;
				  }
				  else if (i%3==1) {
					  odd[y] = b;
					  y= y+1;
				  }
				  else {
					  third[z] = b;
					  z=z+1;
				  }
			 }
			 even[0] = even[0].replace('[','');
			 third[third.length-1] = third[third.length-1].replace(']','');
			 for (var j=0;j<even.length;j++)
			 {
				 $('#'+(j+1)).html("\xa0\xa0\xa0\xa0\xa0\xa0"+even[j]+ "\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0"+odd[j]+ "\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0\xa0"+  "Score:      \xa0  " +third[j]);
			 }
			 },
			 error:function(err)
			 {
				 console.log(err);
			 }
	 });
 
 });