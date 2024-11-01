jQuery(document).ready(function(){
    var abc = document.getElementById('vio-iframe-div').clientWidth;
    if(abc<200){
        var height1='100';
    }else if(abc>199 && abc<250){
        var height1='150';
    }else if(abc>249 && abc<300){
        var height1='175';
    }else if(abc>299 && abc<350){
        var height1='200';
    }else if(abc>349 && abc<400){
        var height1='225';
    }else if(abc>399 && abc<450){
        var height1='250';
    }else if(abc>449 && abc<500){
        var height1='275';
    }else if(abc>499 && abc<550){
        var height1='300';
    }else if(abc>549 && abc<600){
        var height1='325';
    }else if(abc>599 && abc<650){
        var height1='350';
    }else if(abc>649 && abc<700){
        var height1='375';
    }else if(abc>699 && abc<750){
        var height1='400';
    }else if(abc>749 && abc<800){
        var height1='425';
    }else if(abc>799 && abc<850){
        var height1='450';
    }else if(abc>849 && abc<900){
        var height1='475';
    }else if(abc>899 && abc<950){
        var height1='500';
    }else if(abc>949 && abc<1000){
        var height1='525';
    }else if(abc>999 && abc<1050){
        var height1='550';
    }else if(abc>1049 && abc<1100){
        var height1='575';
    }else if(abc>1099 && abc<1150){
        var height1='600';
    }else if(abc>1149 && abc<1200){
        var height1='625';
    }else if(abc>1199 && abc<1250){
        var height1='650';
    }else if(abc>1249 && abc<1300){
        var height1='675';
    }else if(abc>1299 && abc<1350){
        var height1='700';
    }else{
        var height1='725';
    } 
    document.getElementById('vio-iframe-div').height = height1+'px';
});