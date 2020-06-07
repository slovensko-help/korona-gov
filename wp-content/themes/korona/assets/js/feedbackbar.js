function onFeedbackBarLinkClick(event) {
  event.preventDefault();

  var feedbackType = event.target.dataset.feedbackbar

  if (feedbackType === "useful") {
    // TODO GA call
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

function onNotUsefulFormSubmit(event) {
  event.preventDefault();

  var inputFields = {
    detail: event.target.querySelector('textarea[name="detail"]').value
  }

  // TODO AJAX call
  console.log("Form submitted with ", inputFields)
}

function onFoundErrorFormSubmit(event) {
  event.preventDefault();

  var inputFields = {
    errorType: event.target.querySelector('input[name="content-error-type"]:checked').value,
    errorDetail: event.target.querySelector('textarea[name="more-detail"]').value
  }

  // TODO AJAX call
  console.log("Form submitted with ", inputFields)
}

// Initialize
var $feedbackBarLinks = document.querySelectorAll('[data-feedbackbar]')
nodeListForEach($feedbackBarLinks, function ($link) {
  $link.addEventListener("click", onFeedbackBarLinkClick)
})

var $notUsefulForm = document.querySelector('#not-useful-form')
$notUsefulForm.addEventListener("submit", onNotUsefulFormSubmit)

var $foundErorrForm = document.querySelector('#found-error-form')
$foundErorrForm.addEventListener("submit", onFoundErrorFormSubmit)

// TODO error response handling
// TODO success response handling
