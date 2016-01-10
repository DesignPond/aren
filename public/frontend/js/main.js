/* Author: 
DesignPond Cindy Leschaud 2012
*/

$(document).ready(function()
{
/////////////////////////

    $('#illustrations').isotope({
        itemSelector : '.item-image',
        layoutMode: 'packery',
    });

    $('body').on('click','.deleteAction',function(event){

        var $this  = $(this);
        var action = $this.data('action');
        var what   = $this.data('what');

        var what = (0 === what.length ? 'supprimer' : what);
        var answer = confirm('Voulez-vous vraiment ' + what + ' : '+ action +' ?');

        if (answer){
            return true;
        }
        return false;
    });
/////////////////////        
});
























