jQuery(function(){
    let navLink = jQuery('#masthead .main-navigation ul li a');
    navLink.click(function(e){
        e.preventDefault();
        if(jQuery(e.target).attr('id') == 'menu-item-41'){
            jQuery(e.target).attr("href", "http://localhost/wordpress/#about");
        }
    });
});
