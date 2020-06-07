// Adapted from https://github.com/slovensko-digital/navody-frontend/blob/master/src/utilities/appear-link/appear-link.js
function SndAppearLink($module) {
  this.$module = $module
  this.$appear = null
  this.$disappear = null
}

SndAppearLink.prototype.init = function () {
  // Check for module
  var $module = this.$module
  if (!$module) {
    return
  }

  $module.addEventListener("click", this.handleClick.bind(this))
  var appearId = $module.dataset["appear"]
  var disappearId = $module.dataset["disappear"]

  this.$appear = document.getElementById(appearId)
  this.$disappear = document.getElementById(disappearId)
}

SndAppearLink.prototype.handleClick = function (event) {
  event.preventDefault()

  if (this.$appear) {
    this.$appear.classList.remove("idsk-appear-link-hide")
  }
  if (this.$disappear) {
    this.$disappear.classList.add("idsk-appear-link-hide")
  }
}

// Utility functions
function nodeListForEach(nodes, callback) {
  if (window.NodeList.prototype.forEach) {
    return nodes.forEach(callback)
  }
  for (var i = 0; i < nodes.length; i++) {
    callback.call(window, nodes[i], i, nodes)
  }
}

// Initialize
var $appearLinks = document.querySelectorAll('[data-module="idsk-appear-link"]')
nodeListForEach($appearLinks, function ($link) {
  new SndAppearLink($link).init()
})
