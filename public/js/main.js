jQuery(document).ready(function($) {
    addJQueryHandler('#mybutton','#login-container', $);
});
function addJQueryHandler(JQBtnOpenId, JQeditBoxId, $)
{
    $(JQBtnOpenId).click(function()
    {
        var elementStyle = $(JQeditBoxId).css('display');
        if (elementStyle === 'none')
            $(JQeditBoxId).css('display','block');
        else
            $(JQeditBoxId).css('display','none');
    });
}