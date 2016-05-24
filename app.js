(function(){
	var app = angular.module('movieList', []);
	
	app.controller('MoviesController', function(){
		this.movies = [ //test items
			{ 	name: 'Movie 1', 
				year: 1999,
				director: 'director 1', 
				description: 'afadgada',
				rating: 5, //will be generated fron stars given in reviews
				reviews: [{
					stars: 5,
					opinion: "I love this movie!",
					author: "movieGurrl11",
					createdOn: 1397490980837 //genarated auto
					}, {
					stars: 4,
					opinion: "kevään paras",
					author: "Hanna",
					createdOn: 1397490980837
					}]
			},
			
			{ 	name: 'Movie 2', 
				year: 1989,
				director: 'director 2', 
				description: 'afadgasfasfaada',
				rating: 2,
				reviews: [{
					stars: 2,
					opinion: "Semi ok",
					author: "jokke",
					createdOn: 1397490980837
					}, {
					stars: 3,
					opinion: "ihan jees.",
					author: "teemu",
					createdOn: 1397490980837
					}]
			},
		  
		];
	
    
  });
	
/*
	app.directive('movieItem', function(){
		return{
			restrict: 'E',
			templateUrl: 'movie-item.html'
		};
	});
*/
	app.directive('movieItem', function(){
		return{
			restrict: 'A',
			templateUrl: 'movie-item.html'
		};
	});
	

})();