# Conventional Commits

When writing commit messages or explaining changes, always follow the Conventional Commits specification.

## Commit Message Format

```
<type>[optional scope]: <description>

[optional body]

[optional footer(s)]
```

## Allowed Types

*   **feat:** A new feature
*   **fix:** A bug fix
*   **docs:** Documentation only changes
*   **style:** Changes that do not affect the meaning of the code (white-space, formatting, missing semi-colons, etc)
*   **refactor:** A code change that neither fixes a bug nor adds a feature
*   **perf:** A code change that improves performance
*   **test:** Adding missing tests or correcting existing tests
*   **build:** Changes that affect the build system or external dependencies (example scopes: gulp, broccoli, npm)
*   **ci:** Changes to our CI configuration files and scripts (example scopes: Travis, Circle, BrowserStack, SauceLabs)
*   **chore:** Other changes that don't modify src or test files
*   **revert:** Reverts a previous commit

## Rules

*   The `<description>` must contain a succinct description of the change.
*   Use the imperative, present tense: "change" not "changed" nor "changes".
*   Don't capitalize the first letter.
*   No dot (.) at the end.
*   The `[optional body]` should include the motivation for the change and contrast this with previous behavior.
*   The `[optional footer(s)]` should contain any information about Breaking Changes and reference GitHub issues that this commit closes.
