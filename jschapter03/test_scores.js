const scores = [];
let score = 0;

do {
  score = parseInt(prompt("Enter a test score, or enter -1 to end.", -1));
  if ( score >= 0 && score <= 100) {
    scores[scores.length] = score;
  } else if (score != -1) {
    alert("Score must be a valid number from 0 to 100.");
  }
} while ( score != -1 );

if ( scores.length > 0 ) {
  let total = 0;
  // use for-in loop
  for ( let index in scores ) {
    total = total + scores[index];
    document.write("<p>");
    document.write(`Score ${index}: ${scores[index]}`);
    document.write("</p>");
  }
  // TODO calculate average by dividing 'total' by 'length'
  // document.write this value
}