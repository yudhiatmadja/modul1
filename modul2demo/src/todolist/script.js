document.addEventListener("DOMContentLoaded", () => {
  const taskInput = document.getElementById("taskInput");
  const taskDeadline = document.getElementById("taskDeadline");
  const addTaskButton = document.getElementById("addTask");
  const taskList = document.getElementById("taskList");

  const addTask = () => {
    const taskText = taskInput.value.trim();
    const deadlineText = taskDeadline.value;

    if (taskText === "") {
      Swal.fire({
        title: "Masukkan tugas terlebih dahulu!",
        width: 600,
        padding: "3em",
        color: "#716add",
        backdrop: `
              rgba(0,0,123,0.4)
              url("../gif/gif-alert.gif")
              left top
              no-repeat
            `,
      });
      return;
    }

    const li = document.createElement("li");
    li.className = "flex items-center justify-between p-4 hover:bg-blue-900 transition-colors duration-200";

    const checkbox = document.createElement("input");
    checkbox.type = "checkbox";
    checkbox.className = "mr-2 cursor-pointer";

    const span = document.createElement("span");
    span.textContent = taskText + (deadlineText ? ` (Deadline: ${deadlineText})` : "");
    span.className = "flex-1 cursor-pointer text-white";

    checkbox.addEventListener("click", () => {
      span.classList.toggle("line-through");
      span.classList.toggle("text-gray-500");
    });

    const deleteButton = document.createElement("button");

    deleteButton.innerHTML = `<svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
</svg>
`;
    deleteButton.className = "bg-red-500 text-white px-3 py-1 rounded-lg hover:bg-red-600 transition-colors duration-200 rounded-full";

    deleteButton.addEventListener("click", () => {
      taskList.removeChild(li);
    });

    li.appendChild(checkbox);
    li.appendChild(span);
    li.appendChild(deleteButton);
    taskList.appendChild(li);

    taskInput.value = "";
    taskDeadline.value = "";
  };

  addTaskButton.addEventListener("click", addTask);

  taskInput.addEventListener("keypress", (event) => {
    if (event.key === "Enter") {
      addTask();
    }
  });
});
