import lightGallery from 'lightgallery'; 

var projectsGridLightGallery = function () {  
    var be_projects_grid = document.querySelectorAll('.be-projects-grid-section .be-projects-grid');

    be_projects_grid.forEach(element => {
        lightGallery(document.getElementById( element.getAttribute('id') ), {
            selector: '.zoom-image'
        });
    });
}
projectsGridLightGallery();

var be_projects_grid_loadmore = document.querySelectorAll('.be-projects-grid-section .be-projects-grid__loadmore-btn');

be_projects_grid_loadmore.forEach(
    function (element) {
        element.onclick = function(event) {
            event.preventDefault();
            var button = this;
            let page = parseInt( this.getAttribute('data-page') );
            let max_page = parseInt( this.getAttribute('data-max-page'));
            let settings = this.getAttribute('data-settings');
  
            let data = {
                action : 'loadmore_projects_grid',
                page : page,
                settings : settings,
            }

            jQuery.ajax({
                type: "post",
                url: php_data.ajax_url,
                data: data,
                dataType: "json",
                beforeSend : function () {
                    button.classList.add('loading');
                },
                success: function (response) {

                    if ( response.success ) {
                        button.classList.remove('loading');

                        let loadmore = button.closest('.be-projects-grid__loadmore');
                        let projects_grid = jQuery('#block-projects-grid-action-' + loadmore.getAttribute('data-block-id') );
            
                        projects_grid.append( response.data );
    
                        page++;
                        button.setAttribute('data-page', page);
                        if ( page == max_page ) {
                            loadmore.classList.add('hide');
                        }

                        projectsGridLightGallery();
                    }

                },
                error: function( jqXHR, textStatus, errorThrown ){
                    console.log( 'The following error occured: ' + textStatus, errorThrown );
                }
            });

        }
    }
);
