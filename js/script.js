// $("#guest_checkout").on("click", function () {
//   alert("hello");
// });

//Billing Form Toggling
$(document).ready(function () {
  $("#ChatBtn").on("click", function () {
    $("#ChatBox").toggleClass("hidden");
    $("#ChatIcon").toggleClass("hidden");
    $("#ArrowIcon").toggleClass("hidden");
  });

  var url = window.location.href;
  var domain = "http://192.168.18.40/UC-WebProjects/UrbanWrap/";
  console.log(domain);
  if (
    url == domain ||
    url == domain + "index.php" ||
    url == domain + "#media-center" ||
    url == domain + "#properties"
  ) {
    $("#header").addClass("absolute");
    $("#header").removeClass("bg-white");
  } else {
    $("#header").removeClass("absolute");
    $("#header").addClass("bg-white");
  }
});
$("#toggle_billingform").on("input", function () {
  if ($("#toggle_billingform").is(":checked")) {
    $("#billingform").slideUp("slow");
  } else {
    $("#billingform").slideDown("slow");
  }
});

function loader() {
  $("#body").removeClass("overflow-hidden");
  $("#loader").fadeOut().delay("slow");
}

$("input[name=odr_payment_method]").on("input", function () {
  if ($("#bank_transfer").is(":checked")) {
    $("#bank_details").slideDown("slow");
  } else {
    $("#bank_details").slideUp("slow");
  }
});

// Open Searchbar

const searchBox = document.querySelector(".searchBox");
const searchBtn = document.querySelector(".searchBtn");
const innerSearchBox = document.querySelector(".innerSearchBox");
const searchLogoSection = document.querySelector(".searchLogoSection");
searchBtn.addEventListener("click", () => {
  searchBox.classList.remove("hidden");
});
searchBox.addEventListener("click", () => {
  searchBox.classList.add("hidden");
});
innerSearchBox.addEventListener("click", (e) => {
  e.stopPropagation();
});
searchLogoSection.addEventListener("click", (e) => {
  e.stopPropagation();
});

document.addEventListener("keydown", (e) => {
  if (e.key == "Escape") {
    if (!searchBox.classList.contains("hidden")) {
      searchBox.classList.add("hidden");
    }
  }
});

document.querySelectorAll(".counter-box").forEach((box) => {
  const countEl = box.querySelector(".count");
  const increaseBtn = box.querySelector(".increase");
  const decreaseBtn = box.querySelector(".decrease");

  increaseBtn.addEventListener("click", () => {
    let value = parseInt(countEl.innerText);
    countEl.innerText = value + 1;
  });

  decreaseBtn.addEventListener("click", () => {
    let value = parseInt(countEl.innerText);
    if (value > 1) {
      countEl.innerText = value - 1;
    }
  });
});
/* ============================================================
 * Purpose: Dynamic popup handler using SweetAlert2
 * ============================================================ */

// document.addEventListener("DOMContentLoaded", () => {
//   if (!popupData || Number(popupData.popup_ed) !== 1) return;
//   const popupId = Number(popupData.popup_id || 0);

//   // -------------------- Frequency Control --------------------
//   function shouldShowPopup() {
//     if (Number(popupData.popup_setting_visit_everyvisit || 0) === 1)
//       return true;
//     if (Number(popupData.popup_setting_visit_random || 0) === 1)
//       return Math.random() < 0.5;

//     const perday = parseInt(popupData.popup_setting_visit_perday || 0, 10);
//     if (perday <= 0) return true;

//     try {
//       const key = `popup_${popupId}_shown_day`;
//       const today = new Date().toDateString();
//       const stored = JSON.parse(localStorage.getItem(key) || "[]");
//       if (stored[0] === today && Number(stored[1] || 0) >= perday) return false;
//     } catch {}
//     return true;
//   }

//   function setFrequencyFlag() {
//     const perday = parseInt(popupData.popup_setting_visit_perday || 0, 10);
//     if (Number(popupData.popup_setting_visit_everyvisit || 0) === 1) return;

//     const key = `popup_${popupId}_shown_day`;
//     const today = new Date().toDateString();
//     try {
//       const stored = JSON.parse(localStorage.getItem(key) || "[]");
//       if (!stored || stored[0] !== today) {
//         localStorage.setItem(key, JSON.stringify([today, 1]));
//       } else {
//         stored[1] = Number(stored[1] || 0) + 1;
//         localStorage.setItem(key, JSON.stringify(stored));
//       }
//     } catch {}
//   }

// // -------------------- Analytics --------------------
//    window.updateAnalytics = function (type) {
//   if (!popupId) return;
//   fetch("", {
//     method: "POST",
//     headers: { "Content-Type": "application/x-www-form-urlencoded" },
//     body: `popup_id=${popupId}&type=${type}`
//   })
//     .then(res => res.json())
//     .then(data => console.log("Analytics tracked:", data))
//     .catch(err => console.error("Error:", err));
// };

//   // -------------------- Popup Rendering --------------------
//   function showPopup() {
//     if (!shouldShowPopup()) return;
//     const wrapper = document.getElementById("popup-wrapper");
//     if (wrapper) wrapper.style.display = "block";

//     let position = "center";
//     let customClass = { popup: "", container: "" };
//     let backdrop = true;

//     if (popupData.popup_setting_type === "fullscreen") {
//       customClass.popup =
//         "max-w-lg w-full p-6 bg-white rounded-lg shadow-lg relative";
//       customClass.container = "flex items-center justify-center min-h-screen";
//       backdrop = popupData.popup_setting_backdrop_color || "rgba(0,0,0,1)";
//     } else if (popupData.popup_setting_type === "modal") {
//       customClass.popup =
//         "max-w-lg w-full p-6 bg-white rounded-lg shadow-lg relative";
//       customClass.container = "flex items-center justify-center min-h-screen";
//       backdrop = false;
//     } else if (popupData.popup_setting_type === "slidein") {
//       customClass.popup =
//         "w-80 p-4 bg-white rounded-t-lg shadow-lg relative animate-slideIn";
//       customClass.container = "fixed inset-0 flex justify-end items-end";
//       backdrop = false;
//     }

//     let html = `
//       <div class="popup-inner flex flex-col items-start justify-start w-full ">
//         ${
//           popupData.popup_content
//             ? `<p class="text-center font-bold mb-3">${popupData.popup_content}</p>`
//             : ""
//         }
//         ${
//           popupData.popup_img || popupData.popup_img_url
//             ? `
//           <div class="w-full mb-3 flex justify-center">
//             <a href="${
//               popupData.popup_img_target_url || "#"
//             }" target="_blank" onclick="updateAnalytics('click')">
//               <img src="${popupData.popup_img || popupData.popup_img_url}"
//                    alt="popup image"
//                    class="w-full max-h-[70vh] object-contain rounded shadow-sm">
//             </a>
//           </div>`
//             : ""
//         }
//         ${
//           popupData.popup_video || popupData.popup_video_url
//             ? `
//           <div class="w-full mb-3 flex justify-center">
//             <video src="${popupData.popup_video || popupData.popup_video_url}"
//                    class="w-full max-h-[70vh] object-contain rounded shadow-sm"
//                    autoplay muted loop controls></video>
//           </div>`
//             : ""
//         }
//         ${
//           popupData.popup_setting_btn_ed == 1
//             ? `
//           <div class="w-full flex justify-center mt-2">
//             <a href="${popupData.popup_setting_btn_url || "#"}"
//                target="_blank"
//                class="rounded text-white shadow
//                       ${
//                         popupData.popup_setting_btn_size === "sm"
//                           ? "text-sm px-3 py-1"
//                           : popupData.popup_setting_btn_size === "lg"
//                           ? "text-lg px-6 py-3"
//                           : "text-md px-4 py-2"
//                       }"
//                style="background-color: ${
//                  popupData.popup_setting_btn_color || "#3085d6"
//                }"
//                onmouseover="this.style.backgroundColor='${
//                  popupData.popup_setting_btn_hovercolor || "#0d6efd"
//                }'"
//                onmouseout="this.style.backgroundColor='${
//                  popupData.popup_setting_btn_color || "#3085d6"
//                }'"
//                onclick="updateAnalytics('click')">
//                ${popupData.popup_setting_btn_name || "Button"}
//             </a>
//           </div>`
//             : ""
//         }
//       </div>
//     `;
//     Swal.fire({
//       target: document.getElementById("popup-wrapper"),
//       title: popupData.popup_setting_title_ed == 1 ? popupData.popup_title : "",
//       html: html,
//       position: position,
//       customClass: customClass,
//       backdrop: backdrop,
//       showConfirmButton: false,
//       showCloseButton: popupData.popup_setting_closeable_ed == 1,
//       allowOutsideClick: popupData.popup_setting_closeable_ed == 1,
//       allowEscapeKey: popupData.popup_setting_closeable_ed == 1,
//       timer:
//         popupData.popup_setting_closeable_autosec > 0
//           ? popupData.popup_setting_closeable_autosec * 1000
//           : null,

//       didOpen: () => {
//         // set frequency flag (track popup shown)
//         setFrequencyFlag();

//         // lock body scroll for fullscreen popup
//         if (popupData.popup_setting_type === "fullscreen") {
//           document.body.classList.add("overflow-hidden", "h-screen");
//         }

//         // style close (X) button
//         const closeBtn = document.querySelector(".swal2-close");
//         if (closeBtn) {
//           closeBtn.style.position = "absolute";
//           closeBtn.style.top = "10px";
//           closeBtn.style.right = "10px";
//           closeBtn.style.zIndex = "9999";
//           closeBtn.style.width = "32px";
//           closeBtn.style.height = "32px";
//           closeBtn.style.borderRadius = "10%";
//           closeBtn.style.background = "#f3f4f6";
//           closeBtn.style.color = "#111";
//           closeBtn.style.fontSize = "18px";
//           closeBtn.style.fontWeight = "bold";
//           closeBtn.style.display = "flex";
//           closeBtn.style.alignItems = "center";
//           closeBtn.style.justifyContent = "center";
//           closeBtn.style.boxShadow = "0 2px 6px rgba(0,0,0,0.1)";
//           closeBtn.style.cursor = "pointer";

//           // hover effect
//           closeBtn.addEventListener("mouseover", () => {
//             closeBtn.style.background = "#e5e7eb";
//             closeBtn.style.transform = "scale(1.1)";
//           });
//           closeBtn.addEventListener("mouseout", () => {
//             closeBtn.style.background = "#f3f4f6";
//             closeBtn.style.transform = "scale(1)";
//           });
//         }

//         // style popup title
//         const swalTitle = document.querySelector(".swal2-title");
//         if (swalTitle) {
//           swalTitle.style.color = popupData.popup_setting_title_color || "#000";
//           swalTitle.style.textAlign = "center";
//           swalTitle.style.fontWeight = "600";
//           swalTitle.style.fontSize = "1.5rem";
//           swalTitle.style.marginBottom = "10px";
//           swalTitle.style.animation = "flash 1s infinite";
//         }

//         // style popup content (paragraph)
//         const swalContent = document.querySelector(".popup-inner p");
//         if (swalContent) {
//           swalContent.style.textAlign = "center";
//           swalContent.style.fontSize = "1rem";
//           swalContent.style.lineHeight = "1.5";
//           swalContent.style.margin = "0 auto 15px auto";
//           swalContent.style.maxWidth = "90%";
//         }

//         // add flash animation for title if not already added
//         if (!document.getElementById("flash-keyframes")) {
//           const style = document.createElement("style");
//           style.id = "flash-keyframes";
//           style.innerHTML = `
//             @keyframes flash {
//               0%, 50%, 100% { opacity: 1; }
//               25%, 75% { opacity: 0; }
//             }
//           `;
//           document.head.appendChild(style);
//         }
//       },

//       willClose: () => {
//         if (popupData.popup_setting_type === "fullscreen") {
//           document.body.classList.remove("overflow-hidden", "h-screen");
//         }

//         const wrapper = document.getElementById("popup-wrapper");
//         if (wrapper) wrapper.style.display = "none";
//       },
//     });
//   }

//   // -------------------- Trigger Handling --------------------
//   const triggers = (popupData.popup_setting_trigger || "onload")
//     .split(",")
//     .map((s) => s.trim().toLowerCase());

//   if (triggers.includes("onload")) window.addEventListener("load", showPopup);

//   if (triggers.includes("onscroll")) {
//     const scrollHandler = () => {
//       if (window.scrollY > 100) {
//         showPopup();
//         window.removeEventListener("scroll", scrollHandler);
//       }
//     };
//     window.addEventListener("scroll", scrollHandler);
//   }

//   if (triggers.includes("onexit")) {
//     document.addEventListener("mouseout", (e) => {
//       if (!e.relatedTarget && !e.toElement && e.clientY <= 0) showPopup();
//     });
//   }
// });
