function onFeedbackBarLinkClick(event) {
  event.preventDefault();

  var feedbackType = event.target.dataset.feedbackbar

  if (feedbackType === "useful") {
    // TODO
    console.log('"useful" feedback submitted')
    return
  }

  if (feedbackType === "not-useful") {
    // noop
    return
  }

  if (feedbackType === "found-bug") {
    // noop
    return
  }
}

function onFoundErrorFormSubmit(event) {
  event.preventDefault();

  var inputFields = {
    errorType: event.target.querySelector('input[name="content-error-type"]:checked').value,
    errorDetail: event.target.querySelector('textarea[name="more-detail"]').value
  }

  // TODO
  console.log("Form submitted with ", inputFields)
}

// Initialize
var $feedbackBarLinks = document.querySelectorAll('[data-feedbackbar]')
nodeListForEach($feedbackBarLinks, function ($link) {
  $link.addEventListener("click", onFeedbackBarLinkClick)
})

var $foundErorrForm = document.querySelector('#found-error-form')
$foundErorrForm.addEventListener("submit", onFoundErrorFormSubmit)

