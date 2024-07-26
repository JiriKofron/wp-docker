export function myFunc() {
  console.log("Hello from vite")
}

import 'grapesjs/dist/css/grapes.min.css'
import grapesJS from 'grapesjs'

const editor = grapesJS.init({
  fromElement: true,
  container: '#gjs',
  // Size of the editor
  height: '600px',
  width: 'auto',
  storageManager: {
    type: 'local', // Type of the storage, available: 'local' | 'remote'
    autosave: true, // Store data automatically
    autoload: true, // Autoload stored data on init
    stepsBeforeSave: 1, // If autosave enabled, indicates how many changes are necessary before store method is triggered
    options: {
      local: { // Options for the `local` type
        key: 'gjsProject', // The key for the local storage
      },
    }
  },
  blockManager: {
    appendTo: '#blocks',
    blocks: [
      {
        id: 'section', // id is mandatory
        label: '<b>Section</b>', // You can use HTML/SVG inside labels
        collection: 'blocks',
        attributes: { class:'gjs-block-section' },
        content: `<section>
          <h1>This is a simple title</h1>
          <div>This is just a Lorem text: Lorem ipsum dolor sit amet</div>
        </section>`,
      }, {
        id: 'text',
        label: 'Text',
        collection: 'blocks',
        content: '<div data-gjs-type="text">Insert your text here</div>',
      }, {
        id: 'image',
        label: 'Image',
        // Select the component once it's dropped
        select: true,
        collection: 'blocks',
        // You can pass components as a JSON instead of a simple HTML string,
        // in this case we also use a defined component type `image`
        content: {type: 'image'},
        // This triggers `active` event on dropped components and the `image`
        // reacts by opening the AssetManager
        activate: true,
      }
    ]
  },
  // Avoid any default panel
  panels: { defaults: [] },
});

