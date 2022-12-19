let chosenTitle = 1;
const possibleTitles = ["one", "two", "three", "four"];
const numToTitle = { 1: "Mr.", 2: "Ms.", 3: "Mrs.", 4: "Prof." };

const titleHandler = (e) => {
  const titles = document.querySelectorAll(".title");
  titles.forEach((title) => {
    title.classList.remove("control");
  });
  possibleTitles.forEach((val, ind) => {
    chosenTitle = e.target.classList.contains(val) ? ind + 1 : chosenTitle;
  });

  e.target.classList.add("control");
};

const submitNewsHandler = (e) => {
  e.preventDefault();
  const formData = new FormData(e.target);
  const sendingData = {
    fname: "",
    lname: "",
    email: "",
    email_confirm: "",
    title: numToTitle[chosenTitle],
  };
  for (let pair of formData.entries()) {
    // console.log(pair);
    sendingData[pair[0]] = pair[1];
  }
  console.log(sendingData);
  $.ajax({
    type: "GET",
    url: "news_email.php",
    data: sendingData,
    success: function (data) {
      window.location.href = "news_email.php";
    },
    error: function () {},
  });
};

const validateMail = (e1, e2) => {
  if (e1.value != e2.value || e1.value == "" || e2.value == "") {
    e2.setCustomValidity("Emails don't match");
  } else {
    e2.setCustomValidity("");
  }
};
