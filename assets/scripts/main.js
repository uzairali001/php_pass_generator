const toastContainer = document.querySelector(".toast-container");

const form = document.getElementById("form");
const encPassText = document.getElementById("encryptedpass-text");
const encPassContainer = document.querySelector('[data-js="ec_pass_cont"]');


// Add event listener for form submission
form.addEventListener("submit", async (event) => {
  event.preventDefault(); // Prevent default form submission

  
  try {
    const formData = new FormData(form);
    for (const [name, value] of formData.entries()) {
      console.log(`${name}: ${value}`);
    }

    // Use the Fetch API for AJAX request
    const response = await fetch(form.action, {
      method: "POST", // Specify POST method
      body: formData
    });

    // Check if the HTTP response was successful
    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }

    const data = await response.json(); // Parse the JSON response

    // Process the successful response
    if (data && data.hash) {
      encPassText.classList.remove("muted-invert"); // Remove class
      encPassText.textContent = data.hash;          // Set text content
      encPassText.dataset.generated = "true";       // Set data attribute
      encPassText.parentElement.classList.add("generated"); // Add class to parent

      await copyToClipboard(data.hash); // Copy to clipboard (await to ensure completion)
      showToastMessage("Copied to clipboard!"); // Show toast message
    } else {
      // Handle cases where response is not as expected
      console.error("Invalid response format:", data);
      showToastMessage("Error: Invalid response from server.", 4);
    }
  } catch (error) {
    // Catch and log any errors during the fetch operation
    console.error("Fetch error:", error);
    showToastMessage(`Error generating password: ${error.message}`, 5);
  }
});

encPassContainer.addEventListener("click", async () => {
  // Check the data attribute directly
  if (encPassText.dataset.generated === "true") {
    await copyToClipboard(encPassText.textContent); // Copy text content
    showToastMessage("Copied to clipboard!");
  }
});

function showToastMessage(message, timeout = 2) {
  if (empty(message)) {
    return;
  }

  const toastMessage = getToastMessageElement(message);
  toastContainer.appendChild(toastMessage);

  setTimeout(() => {
    toastMessage.classList.add("toast-message--closing");

    setTimeout(() => {
      toastMessage.remove();
    }, 500);
  }, timeout * 1000);
}

function getToastMessageElement(message) {
  const article = document.createElement("article");
  article.classList.add("toast-message");

  const p = document.createElement("p");
  p.classList.add("toast-message-text");
  p.textContent = message;

  article.appendChild(p);

  return article;
}

async function copyToClipboard(text) {
  navigator.clipboard.writeText(text)
}

function empty(n) {
  return !(!!n
    ? typeof n === "object"
      ? Array.isArray(n)
        ? !!n.length
        : !!Object.keys(n).length
      : true
    : false);
}
