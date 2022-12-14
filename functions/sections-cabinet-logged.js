function showSection(event,id,location,color){
	document.getElementById('iframe').src = location+id;
	document.getElementById('line').style.background = color;
	event.currentTarget.style.color = color;
	
	switch(event.currentTarget.id){
		case 'posts':{
			document.getElementById('likes').style.color = 'black';
			document.getElementById('comments').style.color = 'black';
		}break;
		case 'comments':{
			document.getElementById('posts').style.color = 'black';
			document.getElementById('likes').style.color = 'black';
		}break;		
		case 'likes':{
			document.getElementById('posts').style.color = 'black';
			document.getElementById('comments').style.color = 'black';
		}break;
	}


}

