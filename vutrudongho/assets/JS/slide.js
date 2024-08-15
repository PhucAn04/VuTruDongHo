$(function()	{
    $("#btnFadeIn").click(function()	{
        $("figure").fadeIn(1000);
    });
    $("#btnFadeOut").click(function()	{
        $("figure").fadeOut(1000);
    });
    $("#btnFade").click(function()	{
        $("figure").fadeToggle(500);
    });
    $("#casioBrandInfo").on('mouseover',function()	{
        $("figure").slideDown(2000);
    });	
    $("#btnSlideUp").click(function()	{
        $("figure").slideUp("slow");
    });			
    $("#btnSlide").click(function()	{
        $("figure").slideToggle(2000);
    });		
});