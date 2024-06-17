// Inbuilt function

alert("Jambo Bwana")

//DOM 

// EVENTS 
/* 
user events 
browser events 
network events */


// get element of interest 
// varibale declaration using the var keyword 
// case-sensitive joinButton is different from JoinButton

var joinButton = document.getElementById("join-Button");
//DOM Document Object Model (document)
// in js this is an object 
// joinButton.onclick(alert("You have Joined the goats "))
console.log (joinButton)
console.log(document)
// The event listener is called when the user hovers on the join button 
joinButton,addEventListener("mouseover",function () {
    console.log("Someone is interested to join");
} )