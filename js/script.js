function Ctrl($scope)
{
	$scope.templates =
	[
		{name: 'About', 	url: 'pages/about.html'},
		{name: 'Classes', 	url: 'pages/classes.html'},
		{name: 'Contact', 	url: 'pages/contact.html'},
		{name: 'Fun', 		url: 'pages/fun.html'},
		{name: 'Home', 		url: 'pages/home.html'},
		{name: 'Interests', url: 'pages/interests.html'},
		{name: 'More', 		url: 'pages/more.html'},
		{name: 'School', 	url: 'pages/school.html'},
		{name: 'Skills', 	url: 'pages/skills.html'},
		{name: 'Work', 		url: 'pages/work.html'}

	];
	$scope.template = $scope.templates[2];
}



