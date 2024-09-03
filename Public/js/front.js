const category = document.querySelector("#category")
const size = document.querySelector("#size")
const resetBtn = document.querySelector("button.reset")

let redirect_url = location.origin + "/index/filter/"
const paramsfullUrl = location.href.split("/").slice(5)
let params = [0, 0]

category.addEventListener("change", (e) => {
  e.preventDefault()
  id_category = e.target.value
  if (paramsfullUrl[1] !== "") {
    params[0] = id_category
    params[1] = paramsfullUrl[1]
  } else {
    params[0] = id_category
  }
  redirect_url += params.join("/")

  location.replace(redirect_url)
})

size.addEventListener("change", (e) => {
  e.preventDefault()
  id_size = e.target.value
  if (paramsfullUrl[0] !== "") {
    params[0] = paramsfullUrl[0]
    params[1] = id_size
  } else {
    params[0] = "0"
    params[1] = id_size
  }
  redirect_url += params.join("/")

  location.replace(redirect_url)
})

resetBtn.addEventListener("click", (e) => {
  e.preventDefault()
  location.replace(location.origin)
})
