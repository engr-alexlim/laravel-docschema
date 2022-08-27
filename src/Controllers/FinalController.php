<?php

namespace Alex\LaravelDocSchema\Controllers;

use Illuminate\Routing\Controller;
use Alex\LaravelDocSchema\Events\LaravelInstallerFinished;
use Alex\LaravelDocSchema\Helpers\EnvironmentManager;
use Alex\LaravelDocSchema\Helpers\FinalInstallManager;
use Alex\LaravelDocSchema\Helpers\InstalledFileManager;

class FinalController extends Controller
{
    /**
     * Update installed file and display finished view.
     *
     * @param \Alex\LaravelDocSchema\Helpers\InstalledFileManager $fileManager
     * @param \Alex\LaravelDocSchema\Helpers\FinalInstallManager $finalInstall
     * @param \Alex\LaravelDocSchema\Helpers\EnvironmentManager $environment
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function finish(InstalledFileManager $fileManager, FinalInstallManager $finalInstall, EnvironmentManager $environment)
    {
        $installedLogFile = storage_path(strDec('X2ZpbGVjYWNoZWluZw=='));
        if (!file_exists($installedLogFile)) {
            return redirect()->to(url('/').strDec('L2luc3RhbGw='));
        }
        $finalMessages = $finalInstall->runFinal();
        $finalStatusMessage = $fileManager->update();
        $finalEnvFile = $environment->getEnvContent(); 
        return view('pdo::finished', compact('finalMessages', 'finalStatusMessage', 'finalEnvFile'));
    }
}
