Parse.initialize("YNCCDWVYfCzyROrBZhtAj0yV94SoYjEiZf3sQ8MX", "MhnlMSdd1Zrlra6aSzcltHGMGWLRP8Y2hGqxjJun");

function submitScore(val) 
{    
    var scoreObject = Parse.Object.extend("scoreObject");
    var score = new scoreObject();
    score.setObjectId(123);
    score.set("music_id", "test_");
    score.set("score", val);
    score.save(null,{
      success: function(score) {
        $(".success").show();
      },
      error: function(score, error) {
        $(".error").show();
      }
    });
}  
