$(document).ready(function(){

	
   $.ajax({
		url:'./controller.php',
		type: 'POST',
		data:{
			functionname: 'leaders'
		},
		success: function(response){
		var arr = response.split(',');
var odd = new Array(arr.length/2);
		var even = new Array(arr.length -(arr.length/2));
		var x=0,y=0;
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
				if (i%2==0)
				 {
					 even[x] = b;
					 x = x+1;
				 }
				 else {
					 odd[y] = b;
					 y= y+1;
				 }
			}
			even[0] = even[0].replace('[','');
			odd[odd.length-1] = odd[odd.length-1].replace(']','');
			for (var j=0;j<even.length;j++)
			{
				$('#'+(j+1)).html(even[j]+ "____ "+   "Score:        " +odd[j]);
			}
			},
			error:function(err)
			{
				console.log(err);
		
			}
	});

});