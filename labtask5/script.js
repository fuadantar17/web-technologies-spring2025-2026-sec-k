function analyze() {
  let text = document.getElementById("inputText").value;

  let chars = document.getElementById("chars");
  let words = document.getElementById("words");
  let reverse = document.getElementById("reverse");
  let msg = document.getElementById("msg");

  // empty check
  if (text.trim() === "") {
    msg.innerText = "Please write something first!";
    chars.innerText = 0;
    words.innerText = 0;
    reverse.innerText = "";
    return;
  } else {
    msg.innerText = "";
  }

  // character count
  chars.innerText = text.length;

  // word count (manual filter)
  let wordArray = text.split(" ");
  let count = 0;

  for (let i = 0; i < wordArray.length; i++) {
    if (wordArray[i] !== "") {
      count++;
    }
  }

  words.innerText = count;

  // reverse using built-in
  reverse.innerText = text.split("").reverse().join("");
}