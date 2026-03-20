# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/)
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [3.0.0] - 2026-03-19 (Project Forked)

Forked from [phoneburner/http-tortilla](https://github.com/phoneburner/http-tortilla).

> This project is an independently maintained fork of [phoneburner/http-tortilla](https://github.com/phoneburner/http-tortilla), originally
> released under the MIT license, by the original project authors. This fork is neither affiliated with nor endorsed by
> PhoneBurner.

This is a major release that includes significant changes to the project structure and development environment, as well
as updates to the project's dependencies and configuration. The most significant user-facing change is the renaming of
the organization namespace from `PhoneBurner` to `WickedByte`, which will need to be updated in any code that depends on
this project.

### Changed

- Renamed organization namespace from `PhoneBurner` to `WickedByte`
- Updated composer package name from `phoneburner/http-tortilla` to `wickedbyte/http-tortilla`
- Updated default PHP version in Docker configuration to 8.5
- Renamed `docker-compose.yml` to `compose.yml`
- Replaced `phoneburner/coding-standard` with `wickedbyte/coding-standard`
- Updated development dependencies to latest versions
- Updated GitHub Actions to run on PHP version matrix (8.2, 8.3, 8.4, 8.5)
- Updated CONTRIBUTING.md and SECURITY.md files
- Standardized CHANGELOG date format to Keep a Changelog convention
- Replaced `salt-lite` Docker image naming with project-specific names
- Fixed Dockerfile nested heredoc to use distinct delimiters
- Added `sharing=locked` to Dockerfile apt-get cache mount
- Installed PHP `zip` extension in Dockerfile
- Changed `UploadedFileWrapper::setWrapped()` from `private` to `protected` for consistency
- Raised PHPStan analysis level from 8 to max with proper type annotations
- Replaced blanket Prophecy PHPStan suppressor with `jangregor/phpstan-prophecy` extension
- Changed `XDEBUG_MODE` default from `debug` to `off` in `.env.dist`
- Improved CI workflow security (use env vars in sed, add Docker Buildx)

### Added

- Added WickedByte copyright to LICENSE file
- Added fork notice to README.md
- Added `homepage` and `prefer-stable` to composer.json
- Added CODE_OF_CONDUCT.md (Contributor Covenant 3.0)
- Added proper PHP blocks to README code examples
- Added `StreamWrapper` void method test coverage for unwrapped state

## [2.0.1] - 2025-11-13

### Added

- Add explicit support for PHP 8.5 in composer.json constraints.
- [Development Docker Image] Add `PHP_VERSION` and `WITH_XDEBUG` environment variables and build args to make Docker
  image more flexible.

### Changed

- Remove composer.json repository override for 'phoneburner/php-coding-standard' (as it is now available on Packagist)
- [Development Docker Image] Switch from PECL to PIE for installing PHP extensions.
- [Development Docker Image] Optional Xdebug extension is no longer installed by default.
- [Development Docker Image] Install git, fixing Composer root-version warning message.

### Fixed

- Fix whitespace issues in .gitattributes

## [2.0.0] - 2025-07-30

Major changes to the previous unreleased version to bring everything up to date
with the latest versions of PHP, PSR-7, and PHPUnit.

### Added

- Add "Dockerfile", "docker-compose.yml", and ".dockerignore" files to create a standardized isolated development
  environment for contributors.
- Add support for PHP 8.2, 8.3, and 8.4
- Add missing code coverage for `StreamWrapper::tell()`
- A Makefile was added for easier management of common tasks such as cleaning build artifacts, starting a bash shell in
  the development container, running tests, rectifying code style issues, and running PHPStan code analysis.
- Standardized editor configuration was added via ".editorconfig" which automatically sets up indentation, character
  set, and trimming options for the supported types of files.
- Add and configure PHPStan as a project development dependency, updating code to pass at max level
- Add and configure Rector as a project development dependency, running the applicable standard rule sets
- Add SECURITY.md file
- Add CHANGELOG.md file
- Add CONTRIBUTORS.md file
- Add other standard project skeleton files, including ".gitattributes" and ".gitignore"'

### Changed

- Dependency on `psr/http-message` package updated to "^1.0 || ^2.0"
- Return and parameter types have been defined where possible, and in compliance with the PSR-7 "static" return
  requirements. This means that the callback passed to the `setFactory()` methods MUST return `static`
- Tests have been overhauled to work with PHPUnit 10.5, using attributes, and have been cleaned up to pass PHPStan on
  max settings
- Updated the PHP_CodeSniffer configuration to align with our current organization standards
- Updated the copyright year of the project `License` file
- Update README.md to reflect these changes

### Deprecated

- Nothing.

### Removed

- Dropped support for PHP versions less than 8.1.

### Fixed

- Completed code coverage for StreamWrapper::tell()

## [1.0.0-rc1] - 2020-12-17

### Added

- Strict Type Declarations
- Type Declarations Where Possible

### Changed

- Updated minimum PHP version to 7.4
- Expand CI testing scope to PHP 8.0

## [1.0.0-beta2] - 2020-08-18

### Added

- Add Support for wrapping `UploadedFileInterface`

### Changed

- Expand CI testing scope to PHP 7.4

### Fixed

- Fixes the overly aggressive type declarations

## [1.0.0-beta1] - 2020-08-18

### Added

- Initial Release

[Unreleased]: https://github.com/wickedbyte/http-tortilla/compare/v3.0.0...HEAD
[3.0.0]: https://github.com/wickedbyte/http-tortilla/compare/v2.0.1...v3.0.0
[2.0.1]: https://github.com/wickedbyte/http-tortilla/compare/v2.0.0...v2.0.1
[2.0.0]: https://github.com/wickedbyte/http-tortilla/compare/v1.0.0-rc1...v2.0.0
[1.0.0-rc1]: https://github.com/wickedbyte/http-tortilla/compare/v1.0.0-beta2...v1.0.0-rc1
[1.0.0-beta2]: https://github.com/wickedbyte/http-tortilla/compare/v1.0.0-beta1...v1.0.0-beta2
[1.0.0-beta1]: https://github.com/wickedbyte/http-tortilla/releases/tag/v1.0.0-beta1
