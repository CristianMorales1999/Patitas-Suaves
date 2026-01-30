function redirectToPage() {
    var selectedOption = document.getElementById("edit").value;
    if (selectedOption !== "") {
      window.location.href = selectedOption;
    }
  }