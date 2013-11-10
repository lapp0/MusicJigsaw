Parse.initialize("YNCCDWVYfCzyROrBZhtAj0yV94SoYjEiZf3sQ8MX", "MhnlMSdd1Zrlra6aSzcltHGMGWLRP8Y2hGqxjJun");

function submitScore(val) 
{    
    var scoreObject = Parse.Object.extend("scoreObject");
    var score = new scoreObject();
    score.set("music_id", "test_id");
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
