/* Author: 
DesignPond Cindy Leschaud 2012
*/

$(document).ready(function()
{
/////////////////////////

    $(".defaultText").focus(function(src)
    {
        if ($(this).val() == $(this)[0].title)
        {
            $(this).removeClass("defaultTextActive");
            $(this).val("");
            
        }
    });
    
    $(".defaultText").blur(function()
    {
        if ($(this).val() == "")
        {
            $(this).addClass("defaultTextActive");
            $(this).val($(this)[0].title);
        }
    });
    
    $(".defaultText").blur();
    
    
    
    ////////////////////////
	
/////////////////////        
});
























