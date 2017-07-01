// Shared Actions for components to use
// @NOTE: State is the not the State class, but a reference to the elements in the state class

let State : object;

export function init (state ?: object) {
    State = state;
}

export function changeSidebarDisplay (size) {
    State.sidebar.ref.changeSidebarDisplay(size);
    // Adds or removes class based on state change from al-main
    (size === 'full') ? State.app.children[2].classList.add('full-size') : State.app.children[2].classList.remove('full-size');
    store('sidebar_size', size);
}

/**
 * Stores state inside localStorage for application use
 * @param  {string} key   [Item name to store]
 * @param  {string} value [Item value to store]
 */
function store (key : string, value : string) : void {
    localStorage.setItem(key, value);
}
