import fs from 'fs';
import path from 'path';

const devBuild = path.resolve('public/build-dev');
const productionBuild = path.resolve('public/build');

function findManifest(buildDirectory) {
    const possiblePaths = [
        path.join(buildDirectory, 'manifest.json'),
        path.join(buildDirectory, '.vite', 'manifest.json'),
    ];

    for (const manifestPath of possiblePaths) {
        if (fs.existsSync(manifestPath)) {
            return manifestPath;
        }
    }

    throw new Error(`Manifest not found in ${buildDirectory}`);
}

function copyFile(source, destination) {
    fs.mkdirSync(path.dirname(destination), {
        recursive: true,
    });

    fs.copyFileSync(source, destination);
}

function removeOldAsset(oldFile, newFile) {
    if (!oldFile || oldFile === newFile) {
        return;
    }

    const oldPath = path.join(productionBuild, oldFile);

    if (fs.existsSync(oldPath)) {
        fs.unlinkSync(oldPath);
        console.log(`Removed: ${oldFile}`);
    }
}

const devManifestPath = findManifest(devBuild);
const productionManifestPath = findManifest(productionBuild);

const devManifest = JSON.parse(
    fs.readFileSync(devManifestPath, 'utf8')
);

const productionManifest = JSON.parse(
    fs.readFileSync(productionManifestPath, 'utf8')
);

const entries = Object.entries(devManifest);

if (entries.length === 0) {
    throw new Error('No Vite entries found in development manifest.');
}

for (const [key, entry] of entries) {
    const oldEntry = productionManifest[key];

    if (oldEntry?.file) {
        removeOldAsset(oldEntry.file, entry.file);
    }

    if (oldEntry?.css && entry.css) {
        for (const oldCss of oldEntry.css) {
            if (!entry.css.includes(oldCss)) {
                removeOldAsset(oldCss, entry.css.join(','));
            }
        }
    }

    productionManifest[key] = entry;

    if (entry.file) {
        const sourceFile = path.join(devBuild, entry.file);
        const destinationFile = path.join(
            productionBuild,
            entry.file
        );

        if (fs.existsSync(sourceFile)) {
            copyFile(sourceFile, destinationFile);

            console.log(`Updated: ${key}`);
            console.log(`        ${entry.file}`);
        }
    }

    if (entry.css) {
        for (const cssFile of entry.css) {
            const sourceFile = path.join(devBuild, cssFile);
            const destinationFile = path.join(
                productionBuild,
                cssFile
            );

            if (fs.existsSync(sourceFile)) {
                copyFile(sourceFile, destinationFile);

                console.log(`        ${cssFile}`);
            }
        }
    }
}

fs.writeFileSync(
    productionManifestPath,
    JSON.stringify(productionManifest, null, 4) + '\n'
);

console.log('');
console.log('Vite build merged successfully.');