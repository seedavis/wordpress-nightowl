// The variable prevents initial onpopstate on Chrome and Safari. As soon as onpopstate happens or as soon as any pushState happens it is permanently set to 'false'.
var	initialURL = location.href;

function bringPortfolio(current_id){

	global_current_id = current_id;
	
	// If project with such ID does not exist, load project 0 or do nothing
	if(projectsArray[current_id] === undefined){ 
		if(projectsArray.length != 0){
			// If user wants to open projects with page refresh, do this
			if(jQuery('body').hasClass('page-refresh')){
				location.href = projectsArray[0][7];
				return;
			}
			bringPortfolio(0); 
		} 
		return;
	}
	
	// Assign projects array to variables
	var title = projectsArray[current_id][0];
	var desc = projectsArray[current_id][1];
	var date = projectsArray[current_id][2];
	var client = projectsArray[current_id][3];
	var agency = projectsArray[current_id][4];
	var ourrole = projectsArray[current_id][5];
	var slides = projectsArray[current_id][6];
	var permalink = projectsArray[current_id][7];
	var external_link = projectsArray[current_id][8]; // It never exists at this moment but it's reserved space for it
	var categories_array = projectsArray[current_id][9];
	var project_id = projectsArray[current_id][10];
	
	// Count number of projects
	var number_of_ids = projectsArray.length;

	// Make it go to the top and fade out current project data
	jQuery('body,html').animate({scrollTop:0}, 800);

	jQuery('body').addClass('daisho-portfolio-viewing-project');

	setTimeout(function(){
		if(date == ''){ jQuery('.project-date').hide(); }else{ jQuery('.project-date').show(); }
		if(client == ''){ jQuery('.project-client').hide(); }else{ jQuery('.project-client').show(); }
		if(agency == ''){ jQuery('.project-agency').hide(); }else{ jQuery('.project-agency').show(); }
		if(ourrole == ''){ jQuery('.project-ourrole').hide(); }else{ jQuery('.project-ourrole').show(); }
		
		// Show menu, navigation, containers etc.
		jQuery('.portfolio_box').addClass('portfolio_box-visible');
		jQuery('.compact-nav').addClass('compact-nav-visible');
		jQuery('.project-coverslide').addClass('project-coverslide-visible');
		
		// Add current project data
		jQuery('.project-title').html(title);
		jQuery('.project-description').html(desc);
		jQuery('.project-exdate').html(date);
		jQuery('.project-exclient').html(client);
		jQuery('.project-exagency').html(agency);
		jQuery('.project-exourrole').html(ourrole);
		jQuery('.project-slides').html(slides);

		// Update document title, URL and brwosing history using HTML5 History API
		if(Modernizr.history){
			if(!window.history.state || (window.history.state.projid != current_id)){
				window.history.pushState({'cancelback': true, 'projid': current_id}, title, permalink);
				initialURL = false;
			}
			jQuery('title').html(title);
		}
		
		// Setup sharing icons (desktop mode)
		if(jQuery(".sharing-icons").length){
			jQuery(".sharing-icons-twitter").attr("href", "https://twitter.com/share?url="+escape(window.location.href)+"&amp;text="+escape(title));
			jQuery(".sharing-icons-facebook").attr("href", "http://www.facebook.com/sharer.php?u="+escape(window.location.href)+"&amp;t="+escape(title));
			jQuery(".sharing-icons-googleplus").attr("href", "https://plus.google.com/share?url="+escape(window.location.href));
		}

		recreateControls();
	}, 200); // We wait for CSS3 fade out animation to opacity=0 of .portfolio_box (inner container of portfolio) to complete
}

/**
 * Recreates project controls based on currently viewed project and other settings
 */
function recreateControls(){
	console.log(boundary_arrows);
	console.log('loop_through');
	console.log(loop_through);
	// Unbind and show current controls
	jQuery('.portfolio-arrowright').unbind('click.nextproject');
	jQuery('.portfolio-arrowleft').unbind('click.prevproject');
	jQuery('.portfolio-arrowleft').addClass('portfolio-arrowleft-visible');
	jQuery('.portfolio-arrowright').addClass('portfolio-arrowright-visible');

	// Currently selected category ID (alternatively "all" or undefined)
	var selected_category_id = jQuery('#filters').find('li a.selected').attr('data-project-category-id');
	
	// Count number of projects
	var project_ids = projectsArray.length;
	
	// Stop if there's only one project available
	if(project_ids < 2){
		jQuery('.portfolio-arrowleft').removeClass('portfolio-arrowleft-visible');
		jQuery('.portfolio-arrowright').removeClass('portfolio-arrowright-visible');
		return;
	}
	
	// Current project, next and previous IDs
	var project_id_current = global_current_id;
	var project_id_previous = ((project_id_current - 1) < 0) ? (project_ids - 1) : (project_id_current - 1);
	var project_id_next = ((project_id_current + 1) >= project_ids) ? 0 : (project_id_current + 1);

	// Disable boundary arrows mode
	// @uses boundary_arrows (bool) global variable
	if(boundary_arrows){
		if((project_id_current - 1) < 0){
			jQuery('.portfolio-arrowleft').removeClass('portfolio-arrowleft-visible');
		}
		if((project_id_current + 1) >= project_ids){
			jQuery('.portfolio-arrowright').removeClass('portfolio-arrowright-visible');
		}
	}

	// Browse in selected category mode
	// @uses loop_through (bool) global variable
	if(loop_through){ 
		var prevProjects = []; // Previous projects from selected category
		var nextProjects = []; // Next projects from selected category
		var prev_project_arrow = []; // (int|array) - ID of the previous arrow, empty array otherwise
		var next_project_arrow = []; // (int|array) - ID of the next arrow, empty array otherwise
		
		if(selected_category_id == 'all' || selected_category_id === undefined){
			prev_project_arrow[0] = project_id_previous;
			next_project_arrow[0] = project_id_next;
		}else{
			for(var i = 0; i < (projectsArray.length - (projectsArray.length - project_id_current)); i++){
				if(projectsArray[i][9].indexOf(selected_category_id) != -1){
					prevProjects[prevProjects.length] = i; // All previous projects from selected category
				}
			}
			for(var i = (project_id_current + 1); i < projectsArray.length; i++){
				if(projectsArray[i][9].indexOf(selected_category_id) != -1){
					nextProjects[nextProjects.length] = i; // All next projects from selected category
				}
			}
			
			var prev_project_arrow = prevProjects.slice(-1); // One previous project from selected category
			var next_project_arrow = nextProjects.slice(0, 1); // One next project from selected category

			if(prevProjects.length != 0){
				jQuery('.portfolio-arrowleft').attr('href', projectsArray[prev_project_arrow[0]][7]);
			}else{
				jQuery('.portfolio-arrowleft').removeClass('portfolio-arrowleft-visible');
			}
			if(nextProjects.length != 0){
				jQuery('.portfolio-arrowright').attr('href', projectsArray[next_project_arrow[0]][7]);
			}else{
				jQuery('.portfolio-arrowright').removeClass('portfolio-arrowright-visible');
			}
		}
		
		var project_id_previous = prev_project_arrow[0];
		var project_id_next = next_project_arrow[0];
	}
	
	if(projectsArray[project_id_previous] !== undefined){
		jQuery('.portfolio-arrowleft').attr('href', projectsArray[project_id_previous][7]);
	}
	if(projectsArray[project_id_next] !== undefined){
		jQuery('.portfolio-arrowright').attr('href', projectsArray[project_id_next][7]);
	}
	
	// Left Arrow
	jQuery('.portfolio-arrowleft').on('click.prevproject', function(e){
		if(!jQuery('body').hasClass('page-refresh')){
			e.preventDefault();
			bringPortfolio( project_id_previous );
		}
		return;
	});
	
	// Right Arrow
	jQuery('.portfolio-arrowright').on('click.nextproject', function(e){
		if(!jQuery('body').hasClass('page-refresh')){
			e.preventDefault();
			bringPortfolio( project_id_next );
		}
		return;
	});
}

function closePortfolioItem(){
	global_current_id = false;
	jQuery('.portfolio_box').removeClass('portfolio_box-visible');
	jQuery('body').removeClass('daisho-portfolio-viewing-project');
	jQuery('.compact-nav').removeClass('compact-nav-visible');
	jQuery('.project-coverslide').removeClass('project-coverslide-visible');
	
	jQuery('.portfolio-arrowright').removeClass('portfolio-arrowright-visible');
	jQuery('.portfolio-arrowleft').removeClass('portfolio-arrowleft-visible');
	
	jQuery('.project-slides').empty();
	jQuery('title').html(portfolio_page_title);
}

jQuery(document).ready(function(){
	jQuery('.back').on('click', function(e){

		// If button is supposed to redirect to some external URL prevent any other action
		if(jQuery(this).hasClass('back-link-external') || jQuery('body').hasClass('single-portfolio')){
			return;
		}
		
		e.preventDefault();
		closePortfolioItem();
		if(Modernizr.history){
			window.history.pushState({}, portfolio_page_title, portfolio_page_url);
			initialURL = false;
		}
	});

	// Close project on background click
	jQuery(document).on('click', '.project-coverslide', function(){
		closePortfolioItem();
	});
});

window.onpopstate = function(ev){
	var evstate = (ev.state) ? ev.state : {};

	// Ignore initial onpopstate on Chrome and Safari
	if(location.href == initialURL){
		popped = true;
		initialURL = false;
		return;
	}
	initialURL = false;

	if(!evstate.cancelback){
		if(jQuery('body').hasClass('single-portfolio')){
			location.href = jQuery('.back').attr('href');
		}else{
			closePortfolioItem();
		}
	}else{
		if(ev.state.projid || ev.state.projid == 0){
			bringPortfolio(ev.state.projid);
		}
	}
}

jQuery(document).ready(function(){
    
    var $container = jQuery('#container');

	// add randomish size classes
	$container.find('.element').each(function(){
		var $this = jQuery(this);
		var number = parseInt( $this.attr('data-number'), 10 );
		if ( number == 1 ) {
			$this.addClass('width3');
			$this.addClass('height2');
		} else if ( number == 2 ) {
			$this.addClass('width2');
			$this.addClass('height2');
		} else if ( number == 3 ) {
			$this.addClass('height2');
		} else if ( number == 4 ) {
			$this.addClass('width2');
		}
	});
	
	if(jQuery('body').hasClass('single-portfolio')){
		recreateControls();
	}
    
	if(jQuery('body').hasClass('rtl')){
		jQuery.Isotope.prototype._positionAbs = function( x, y ) {
			return { right: x, top: y };
		};
		var isoTransforms = false;
	}else{
		var isoTransforms = true;
	}
	
    $container.isotope({
		itemSelector : '.element',
		transformsEnabled: isoTransforms,
		masonry : {
			columnWidth : 1,
			gutterWidth: 1,
		},
		getSortData : {
			number : function( $elem ) {
				return parseInt( $elem.attr('data-number'), 10 );
			}
		}
	});

	var $optionSets = jQuery('#options .option-set'),
	$optionLinks = $optionSets.find('a');
	$optionLinks.click(function(){
		var $this = jQuery(this);
		// don't proceed if already selected
		if ( $this.hasClass('selected') ) {
			return false;
		}
		var $optionSet = $this.parents('.option-set');
		$optionSet.find('.selected').removeClass('selected');
		$this.addClass('selected');

		// make option object dynamically, i.e. { filter: '.my-filter-class' }
		var options = {},
			key = $optionSet.attr('data-option-key'),
			value = $this.attr('data-option-value');
		// parse 'false' as false boolean
		value = value === 'false' ? false : value;
		options[ key ] = value;

		$container.isotope( options );

		return false;
	});

	// change size of clicked element
	$container.on('click', '.element', function(){
		
		// Exclude external link thumbnails
		if(jQuery(this).find('.thumbnail-link').length != 0){
			return;
		}
		
		// Don't run JavaScript if user wants to open projects with page refresh
		if(jQuery('body').hasClass('page-refresh')){
			return;
		}
		
		var current_id = parseInt( jQuery(this).attr('data-id'), 10 );
		bringPortfolio(current_id);
	});
	
	// Prevent thumbnail links from working unless they are external links.
	$container.on('click', '.thumbnail-project-link', function(e){
		// Don't run JavaScript if user wants to open projects with page refresh
		if(jQuery('body').hasClass('page-refresh')){
			return;
		}
		e.preventDefault();
	});

	// toggle variable sizes of all elements
	jQuery('#toggle-sizes').find('a').click(function(){
		if(jQuery(this).hasClass('toggle-selected')){
			return false;
		}
		jQuery('#toggle-sizes').find('a').removeClass('toggle-selected');
		jQuery(this).addClass('toggle-selected');
		$container.toggleClass('variable-sizes').isotope('reLayout');
		centerIsotopeImages();
		return false;
	});
	
	// Shuffle button
	jQuery('#shuffle a').click(function(){
		$container.isotope('shuffle');
		return false;
	});
});

/**
 * Centers images inside Isotope's thumbnails.
 */
function centerIsotopeImages(){
	jQuery('.element').each(function(){
		var $this = jQuery(this);

		// Center images
		if($this.find('img').get(0) === undefined){
			return;
		}
		var cont_ratio = $this.width() / $this.height();
		var img_ratio = $this.find('img').get(0).width / $this.find('img').get(0).height;

		if(cont_ratio <= img_ratio){
			$this.find('img').css({ 'width' : 'auto', 'height' : '100%', 'top' : 0 }).css({ 'left' : ~(($this.find('img').width()-$this.width())/2)+1 });
			$this.find('img').addClass('project-img-visible');
		}else{
			$this.find('img').css({ 'width' : '100%', 'height' : 'auto', 'left' : 0 }).css({ 'top' : ~(($this.find('img').height()-$this.height())/2)+1 });
			$this.find('img').addClass('project-img-visible');
		}
	});
	
	return;
}
jQuery(window).load(function(){
	centerIsotopeImages();
});

jQuery(document).ready(function(){
	// Center images inside thumbnails on window resize
	jQuery(window).bind("resize.centerIsotopeImages", function(){
		centerIsotopeImages();
	});

	// Snippet below is present because individual images load earlier than global window load happens
	jQuery(".project-img").one("load",function(){
		var $this = jQuery(this);
		var cont_ratio = $this.parent().width() / $this.parent().height();
		var img_ratio = $this.get(0).width / $this.get(0).height;
		if(cont_ratio <= img_ratio){
			$this.css({ 'width' : 'auto', 'height' : '100%', 'top' : 0 }).css({ 'left' : ~(($this.width()-$this.parent().width())/2)+1 });
			$this.addClass('project-img-visible');
		}else{
			$this.css({ 'width' : '100%', 'height' : 'auto', 'left' : 0 }).css({ 'top' : ~(($this.height()-$this.parent().height())/2)+1 });
			$this.addClass('project-img-visible');
		}
	});
});