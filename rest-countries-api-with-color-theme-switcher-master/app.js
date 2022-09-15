import { renderDashboard } from "./view-dashboard.js";
import { renderDetail } from "./view-detail.js";

export { renderCountriesList } from "./dom-utils.js";
// console.log("test");

if (window.location.search.includes("?country=")) {
  renderDetail();
} else {
  document.querySelector(".filters").classList.add("active");
  renderDashboard();
}
